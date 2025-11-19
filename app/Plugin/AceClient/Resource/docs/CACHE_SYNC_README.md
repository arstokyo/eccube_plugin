# Cache Sync System - AceClient43 Plugin

## Overview

The Cache Sync System provides HTTP-based cache clearing from admin server to front servers. This is designed for environments where front servers use `opcache.validate_timestamps=0` (OPcache validation disabled), requiring manual OPcache resets.

## Architecture

```
┌─────────────────┐           HTTP POST            ┌─────────────────┐
│  Admin Server   │ ──────────────────────────────> │  Front Server 1 │
│                 │    X-Cache-Sync-Token header    │                 │
│  - Clear local  │                                 │  - Clear OPcache│
│    cache        │                                 │  - Clear Symfony│
│  - Trigger sync │    ┌─────────────────┐         │    cache        │
│                 │────>│  Front Server 2 │         └─────────────────┘
└─────────────────┘    └─────────────────┘
```

## Features

✅ **No Core Modifications**
   - Uses EventListener (kernel.terminate event)
   - Detects cache clear from admin panel automatically
   - No changes to EC-CUBE core files required

✅ **Standard Dependencies**
   - Uses GuzzleHttp\Client (already in EC-CUBE)
   - No additional composer packages needed

✅ **Flexible Admin Detection**
   - Explicit hostname configuration (priority)
   - Keyword-based auto-detection (fallback)

✅ **Multi-Server Support**
   - Support for multiple front servers
   - Sequential processing with retry per server

✅ **Security**
   - Token-based authentication
   - Timing-safe token comparison

✅ **Reliability**
   - Configurable timeout
   - Automatic retry with exponential backoff
   - Graceful failure handling (doesn't break admin operations)

✅ **Monitoring**
   - Comprehensive logging
   - Health check endpoint
   - Detailed execution metrics

## Configuration

### 1. Environment Variables (.env or .env.local)

```bash
###> AceClient43 Cache Sync Configuration ###

# Enable/disable cache sync (default: true)
ACE_CACHE_SYNC_ENABLED=true

# Shared secret token for authentication (REQUIRED for security)
# Generate with: openssl rand -base64 32
ACE_CACHE_SYNC_TOKEN="your-super-secret-token-here-change-this"

# Front server URLs (JSON array format)
# Multiple servers supported, separate with commas
ACE_CACHE_SYNC_FRONT_SERVERS=["https://front1.example.com","https://front2.example.com"]

# Optional: Explicit admin hostname (takes priority over keyword detection)
# If not set, uses keyword-based auto-detection
ACE_CACHE_SYNC_ADMIN_HOST="admin.example.com"

# Optional: HTTP request timeout in seconds (default: 10)
ACE_CACHE_SYNC_TIMEOUT=10

# Optional: Number of retry attempts on failure (default: 2)
ACE_CACHE_SYNC_RETRY_ATTEMPTS=2

# Optional: Enable cache warmup after clearing (default: true)
# After cache:clear --no-warmup, runs cache:warmup to precompile cache
ACE_CACHE_SYNC_WARMUP_ENABLED=true

# Optional: Cache warmup timeout in seconds (default: 30)
ACE_CACHE_SYNC_WARMUP_TIMEOUT=30

# Optional: Number of homepage reload attempts (default: 3)
# Reloads homepage to fix blank page and rebuild Symfony cache
ACE_CACHE_SYNC_HOMEPAGE_RELOAD_COUNT=3

###< AceClient43 Cache Sync Configuration ###
```

### Cache Clear Process on Front Servers

When cache is cleared on admin server, the following happens on each front server:

1. **Clear OPcache** - `opcache_reset()` to clear compiled PHP files
2. **Clear Symfony Cache** - `cache:clear --no-warmup` to remove cache files
3. **Reload Homepage** - Multiple HTTP requests to fix blank page and trigger cache rebuild
4. **Warmup Cache** (optional) - `cache:warmup` to precompile cache files

**Why reload homepage?**
After `cache:clear --no-warmup`, the first request rebuilds the Symfony cache. Without this step, users may see a blank page or errors during the rebuild process. The homepage reload ensures the cache is fully functional before users access the site.

**Why warmup cache?**
Warmup precompiles cache files, making subsequent requests faster. This is optional and can be disabled if you prefer on-demand cache generation.

### 2. Admin Server Detection

The system determines if it's running on the admin server using this priority:

#### Priority 1: Explicit Configuration (Recommended)
If `ACE_CACHE_SYNC_ADMIN_HOST` is set, compares current hostname with configured value:
```bash
# Explicit admin hostname
ACE_CACHE_SYNC_ADMIN_HOST="admin.example.com"
```

#### Priority 2: Keyword Auto-Detection (Fallback)
If `ACE_CACHE_SYNC_ADMIN_HOST` is NOT set, checks if hostname contains these keywords:
- `admin`
- `adm.`
- `manager`

Example hostnames that would be detected as admin servers:
- `admin.example.com` ✓
- `adm.production.com` ✓
- `manager-01.example.com` ✓
- `web-front-01.example.com` ✗

### 3. Generate Secure Token

Generate a secure random token for authentication:

```bash
# Linux/Mac
openssl rand -base64 32

# Or using PHP
php -r "echo base64_encode(random_bytes(32)) . PHP_EOL;"
```

**Important:** Use the SAME token on all servers (admin + front servers).

## Usage

### Clearing Cache from Admin Panel

1. Navigate to: Admin > Content Management > Cache Management
2. Click "Clear Cache" button
3. System will:
   - Clear local cache on admin server
   - Automatically send cache clear requests to all configured front servers
   - Log results

### Clearing Cache via Command Line

When running `bin/console cache:clear --no-warmup`, the cache sync is triggered automatically through the `CacheUtil` service.

```bash
# Clear cache (automatically syncs to front servers)
php bin/console cache:clear --no-warmup
```

## API Endpoints

### Cache Clear Endpoint (Front Servers)

**URL:** `POST /%eccube_admin_route%/internal/cache/clear`

**Headers:**
- `X-Cache-Sync-Token`: Your authentication token
- `Content-Type`: application/json

**Request Body:**
```json
{
  "source": "admin.example.com",
  "timestamp": 1234567890
}
```

**Response (Success):**
```json
{
  "success": true,
  "message": "Cache cleared successfully",
  "hostname": "front1.example.com",
  "timestamp": 1234567890,
  "execution_time_ms": 123.45,
  "results": {
    "opcache": "cleared",
    "symfony_cache": "clearing"
  }
}
```

**Response (Unauthorized):**
```json
{
  "success": false,
  "message": "Unauthorized: invalid or missing auth token"
}
```

### Health Check Endpoint (Front Servers)

**URL:** `GET /%eccube_admin_route%/internal/cache/health`

**Response:**
```json
{
  "status": "ok",
  "hostname": "front1.example.com",
  "timestamp": 1234567890,
  "opcache_enabled": true,
  "apc_enabled": false,
  "wincache_enabled": false
}
```

## Logging

All operations are logged to the `ace_client` log channel:

**Log File:** `var/log/{environment}/ace_client.log`

**Log Prefixes:**
- `[CacheClearSync]` - Sync service operations
- `[InternalCacheController]` - Endpoint operations

**Example Log Entries:**

```log
[2025-01-10 10:30:00] ace_client.INFO: [CacheClearSync] Starting cache sync to front servers {"front_servers":["https://front1.com"],"current_host":"admin.example.com"}

[2025-01-10 10:30:01] ace_client.INFO: [CacheClearSync] Successfully cleared cache on front server {"url":"https://front1.com/admin/internal/cache/clear","attempt":1}

[2025-01-10 10:30:02] ace_client.INFO: [InternalCacheController] Cache clear request received {"source":"admin.example.com","ip":"192.168.1.100"}

[2025-01-10 10:30:03] ace_client.INFO: [InternalCacheController] OPcache cleared successfully
```

## Troubleshooting

### Problem: Cache sync not working

**Check 1: Is cache sync enabled?**
```bash
# In .env or .env.local
ACE_CACHE_SYNC_ENABLED=true
```

**Check 2: Is token configured on all servers?**
```bash
# SAME token on admin AND front servers
ACE_CACHE_SYNC_TOKEN="your-token-here"
```

**Check 3: Are front servers configured correctly?**
```bash
# Valid JSON array with proper URLs
ACE_CACHE_SYNC_FRONT_SERVERS=["https://front1.com","https://front2.com"]
```

**Check 4: Can admin server reach front servers?**
```bash
# Test connectivity from admin server
curl -X POST https://front1.example.com/admin/internal/cache/clear \
  -H "X-Cache-Sync-Token: your-token-here" \
  -H "Content-Type: application/json" \
  -d '{"source":"test","timestamp":1234567890}'
```

**Check 5: Review logs**
```bash
# Check admin server logs
tail -f var/log/prod/ace_client.log | grep CacheClearSync

# Check front server logs
tail -f var/log/prod/ace_client.log | grep InternalCacheController
```

### Problem: Getting 401 Unauthorized

**Cause:** Token mismatch between admin and front servers

**Solution:** Ensure the SAME token is configured in `.env.local` on ALL servers:
```bash
# On admin server
ACE_CACHE_SYNC_TOKEN="abc123xyz"

# On front server 1
ACE_CACHE_SYNC_TOKEN="abc123xyz"  # MUST be identical

# On front server 2
ACE_CACHE_SYNC_TOKEN="abc123xyz"  # MUST be identical
```

### Problem: Timeout errors

**Solution 1:** Increase timeout:
```bash
ACE_CACHE_SYNC_TIMEOUT=30  # Increase from default 10 seconds
```

**Solution 2:** Increase retry attempts:
```bash
ACE_CACHE_SYNC_RETRY_ATTEMPTS=3  # Increase from default 2 attempts
```

### Problem: Not detecting admin server correctly

**Solution:** Use explicit admin host configuration:
```bash
# Instead of relying on keyword detection
ACE_CACHE_SYNC_ADMIN_HOST="admin.example.com"
```

**Debug:** Check current detection:
```php
// In a controller or command
$config = $cacheClearSyncService->getConfig();
dump($config);
// Shows: is_admin_server, current_hostname, detection method
```

## Security Considerations

### 1. Network Security

**Recommendation:** Configure firewall rules to restrict access to the internal cache endpoint:

```bash
# Example: Allow only admin server IP
# In front server firewall (iptables example)
iptables -A INPUT -p tcp --dport 443 -s <admin-server-ip> -j ACCEPT
iptables -A INPUT -p tcp --dport 443 -d /admin/internal/cache/clear -j DROP
```

### 2. Token Security

- ✅ Use strong random tokens (32+ bytes)
- ✅ Store tokens in `.env.local` (not in version control)
- ✅ Use HTTPS for all communication
- ✅ Rotate tokens periodically
- ❌ Never commit tokens to git
- ❌ Never log token values

### 3. HTTPS Only

Always use HTTPS for front server URLs:
```bash
# ✅ Correct
ACE_CACHE_SYNC_FRONT_SERVERS=["https://front1.com"]

# ❌ Insecure
ACE_CACHE_SYNC_FRONT_SERVERS=["http://front1.com"]
```

## Performance Considerations

### Retry Strategy

The system uses exponential backoff for retries:
- Attempt 1: Immediate
- Attempt 2: Wait 1 second
- Attempt 3: Wait 2 seconds
- Attempt 4: Wait 4 seconds

Total max time = `(timeout * attempts) + backoff_time`

Example with defaults:
- Timeout: 10s
- Attempts: 2
- Max time: ~21 seconds per server (10s + 1s + 10s)

### Multiple Front Servers

Front servers are contacted **sequentially** (not in parallel). For 3 front servers with defaults:
- Best case: ~3 seconds (3 * 1s success)
- Worst case: ~63 seconds (3 * 21s all fail)

**Recommendation:** For many front servers, consider:
1. Increasing timeout/retries only if needed
2. Using async processing (future enhancement)

## Testing

### Test Admin Detection

```php
// In a controller or command
$config = $cacheClearSyncService->getConfig();

echo "Current hostname: " . $config['current_hostname'] . "\n";
echo "Is admin server: " . ($config['is_admin_server'] ? 'YES' : 'NO') . "\n";
echo "Detection method: " . ($config['admin_host'] ? 'Explicit' : 'Keywords') . "\n";
```

### Test Front Server Connectivity

```bash
# From admin server
curl -v -X POST https://front1.example.com/admin/internal/cache/clear \
  -H "X-Cache-Sync-Token: your-token-here" \
  -H "Content-Type: application/json" \
  -d '{"source":"test-cli","timestamp":'$(date +%s)'}'
```

Expected response:
```json
{
  "success": true,
  "message": "Cache cleared successfully",
  "hostname": "front1.example.com",
  ...
}
```

### Test Health Check

```bash
curl https://front1.example.com/admin/internal/cache/health
```

## Migration Guide

### From SSH-based (deploy.sh) to HTTP-based

**Old approach (deploy.sh):**
```bash
ssh front-server "php bin/console cache:clear --no-warmup"
```

**New approach (Automatic via HTTP):**
1. Configure `.env.local` on all servers
2. Clear cache from admin panel or command line
3. System automatically syncs to front servers

**Benefits:**
- ✅ No SSH key management
- ✅ Works from web UI
- ✅ Better error handling
- ✅ Automatic retries
- ✅ Comprehensive logging

## Support

For issues or questions:
1. Check logs: `var/log/prod/ace_client.log`
2. Use health check endpoint to verify configuration
3. Test token authentication manually with curl
4. Review this documentation

## Version History

- **v1.0.0** - Initial release with HTTP-based cache sync
  - Admin server detection (explicit + keyword fallback)
  - Multi-server support
  - Token authentication
  - Retry mechanism
  - Health check endpoint
