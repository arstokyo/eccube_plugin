<?php

namespace Plugin\AceClient43\Util\Normalizer;

/**
 * パスをナビゲートして値を更新することで、SOAP XMLリクエストを変更するサービス。
 * SOAPエンベロープとネストされたCDATAコンテンツの両方を処理します。
 */
class AddCartXmlRequestModifier
{
    private const DEFAULT_SOAP_NAMESPACE = 'http://ar-system-api.co.jp/';
    private const DEFAULT_SOAP_PREFIX = 'addCart';
    private const CDATA_ELEMENT_PATH = '//addCart:prm';

    /**
     * 指定されたパスのSOAP XML内の要素を変更します。
     *
     * @param string $rawXml 生のSOAP XML文字列
     * @param string $path 要素へのパス（例：'jyudenfree/free' または 'jyudenfree/fmkbn'）
     * @param string|null $value 設定する値（nullの場合はパスの存在のみを確認）
     * @param string|null $soapNamespace オプションのカスタムSOAP名前空間
     * @param string|null $soapPrefix オプションのSOAPプレフィックス
     * @param bool $removeIfNull 値がnullの場合にノードを削除するかどうか
     *
     * @return string 変更されたXML文字列
     *
     * @throws \Exception
     */
    public function modify(
        string $rawXml,
        string $path,
        ?string $value = null,
        ?string $soapNamespace = null,
        ?string $soapPrefix = null,
        bool $removeIfNull = true,
    ): string {
        return $this->processXmlModification(
            $rawXml,
            $soapNamespace,
            $soapPrefix,
            function (\SimpleXMLElement $innerXml) use ($path, $value, $removeIfNull) {
                $this->navigateAndSetValue($innerXml, $path, $value, $removeIfNull);
            }
        );
    }

    /**
     * 条件に基づいてSOAP XML内の要素を変更します。
     * 複数の同じ名前の親要素がある場合に、特定の子要素の値に基づいて対象を絞り込みます。
     *
     * 例: jyudenfree要素が複数ある場合、fmkbn=203006のjyudenfree内のfree要素のみを変更
     *
     * @param string $rawXml 生のSOAP XML文字列
     * @param string $parentPath 親要素へのパス（例：'jyudenfree'）
     * @param string $conditionPath 条件となる子要素のパス（例：'fmkbn'）
     * @param string $conditionValue 条件となる値（例：'203006'）
     * @param string $targetPath 変更する子要素のパス（例：'free'）
     * @param string|null $value 設定する値
     * @param string|null $soapNamespace オプションのカスタムSOAP名前空間
     * @param string|null $soapPrefix オプションのSOAPプレフィックス
     * @param bool $removeIfNull 値がnullの場合にノードを削除するかどうか
     *
     * @return string 変更されたXML文字列
     */
    public function modifyWithCondition(
        string $rawXml,
        string $parentPath,
        string $conditionPath,
        string $conditionValue,
        string $targetPath,
        ?string $value = null,
        ?string $soapNamespace = null,
        ?string $soapPrefix = null,
        bool $removeIfNull = true,
    ): string {
        return $this->processXmlModification(
            $rawXml,
            $soapNamespace,
            $soapPrefix,
            function (\SimpleXMLElement $innerXml) use ($parentPath, $conditionPath, $conditionValue, $targetPath, $value, $removeIfNull) {
                $this->navigateAndSetValueWithCondition(
                    $innerXml,
                    $parentPath,
                    $conditionPath,
                    $conditionValue,
                    $targetPath,
                    $value,
                    $removeIfNull
                );
            }
        );
    }

    /**
     * SOAP XML内の複数の要素を変更します。
     *
     * @param string $rawXml 生のSOAP XML文字列
     * @param array $modifications ['path' => 'value'] ペアの配列
     * @param string|null $soapNamespace オプションのカスタムSOAP名前空間
     * @param string|null $soapPrefix オプションのカスタムSOAPプレフィックス
     * @param bool $removeNodeIfNullValue 値がnullの場合にノードを削除するかどうか
     *
     * @return string 変更されたXML文字列
     */
    public function modifyMultiple(
        string $rawXml,
        array $modifications,
        ?string $soapNamespace = null,
        ?string $soapPrefix = null,
        bool $removeNodeIfNullValue = true,
    ): string {
        return $this->processXmlModification(
            $rawXml,
            $soapNamespace,
            $soapPrefix,
            function (\SimpleXMLElement $innerXml) use ($modifications, $removeNodeIfNullValue) {
                foreach ($modifications as $path => $value) {
                    $this->navigateAndSetValue($innerXml, $path, $value, $removeNodeIfNullValue);
                }
            }
        );
    }

    /**
     * SOAP XML内の複数の要素をバッチで変更します（単純な変更と条件付き変更の両方をサポート）。
     * 1回のXML解析で全ての変更を適用するため、効率的です。
     *
     * @param string $rawXml 生のSOAP XML文字列
     * @param array $modifications 変更の配列。各要素は以下のいずれか:
     *   - ['type' => 'simple', 'path' => 'path/to/element', 'value' => 'value']
     *   - ['type' => 'conditional', 'parentPath' => 'jyudenfree', 'conditionPath' => 'fmkbn',
     *      'conditionValue' => '203006', 'targetPath' => 'free', 'value' => 'value']
     * @param string|null $soapNamespace オプションのカスタムSOAP名前空間
     * @param string|null $soapPrefix オプションのSOAPプレフィックス
     * @param bool $removeNodeIfNullValue 値がnullの場合にノードを削除するかどうか
     *
     * @return string 変更されたXML文字列
     */
    public function modifyBatch(
        string $rawXml,
        array $modifications,
        ?string $soapNamespace = null,
        ?string $soapPrefix = null,
        bool $removeNodeIfNullValue = true,
    ): string {
        return $this->processXmlModification(
            $rawXml,
            $soapNamespace,
            $soapPrefix,
            function (\SimpleXMLElement $innerXml) use ($modifications, $removeNodeIfNullValue) {
                foreach ($modifications as $modification) {
                    $type = $modification['type'] ?? 'simple';

                    if ($type === 'conditional') {
                        // Conditional modification
                        $this->navigateAndSetValueWithCondition(
                            $innerXml,
                            $modification['parentPath'],
                            $modification['conditionPath'],
                            $modification['conditionValue'],
                            $modification['targetPath'],
                            $modification['value'] ?? null,
                            $removeNodeIfNullValue
                        );
                    } else {
                        // Simple path modification
                        $this->navigateAndSetValue(
                            $innerXml,
                            $modification['path'],
                            $modification['value'] ?? null,
                            $removeNodeIfNullValue
                        );
                    }
                }
            }
        );
    }

    /**
     * XML変更処理の共通ロジックを実行します。
     *
     * @param string $rawXml 生のSOAP XML文字列
     * @param string|null $soapNamespace オプションのカスタムSOAP名前空間
     * @param string|null $soapPrefix オプションのSOAPプレフィックス
     * @param callable $modificationCallback 変更を適用するコールバック関数
     *
     * @return string 変更されたXML文字列
     */
    private function processXmlModification(
        string $rawXml,
        ?string $soapNamespace,
        ?string $soapPrefix,
        callable $modificationCallback,
    ): string {
        $namespace = $soapNamespace ?? self::DEFAULT_SOAP_NAMESPACE;
        $prefix = $soapPrefix ?? self::DEFAULT_SOAP_PREFIX;

        // Setup DOM document
        [$dom, $prmNode] = $this->setupDomDocument($rawXml, $namespace, $prefix);

        if ($prmNode === null) {
            return $rawXml;
        }

        // Extract CDATA content
        $cdataContent = $this->extractCdataContent($prmNode);

        if (empty($cdataContent)) {
            return $rawXml;
        }

        // Parse the inner XML from CDATA
        $innerXml = new \SimpleXMLElement($cdataContent);

        // Apply modifications via callback
        $modificationCallback($innerXml);

        // Reconstruct and replace CDATA content
        return $this->replaceCdataContent($dom, $prmNode, $innerXml);
    }

    /**
     * DOMDocumentをセットアップし、prm要素を取得します。
     *
     * @param string $rawXml 生のSOAP XML文字列
     * @param string $namespace SOAP名前空間
     * @param string $prefix SOAPプレフィックス
     *
     * @return array [\DOMDocument, \DOMNode|null]
     */
    private function setupDomDocument(string $rawXml, string $namespace, string $prefix): array
    {
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = false;
        $dom->loadXML($rawXml);

        // Create XPath with namespace
        $xpath = new \DOMXPath($dom);
        $xpath->registerNamespace($prefix, $namespace);

        // Get the prm element
        $xpathQuery = str_replace('addCart', $prefix, self::CDATA_ELEMENT_PATH);
        $prmNodes = $xpath->query($xpathQuery);

        $prmNode = $prmNodes->length > 0 ? $prmNodes->item(0) : null;

        return [$dom, $prmNode];
    }

    /**
     * prm要素からCDATAコンテンツを抽出します。
     *
     * @param \DOMNode $prmNode prm要素のDOMノード
     *
     * @return string CDATAコンテンツ
     */
    private function extractCdataContent(\DOMNode $prmNode): string
    {
        $cdataContent = '';
        foreach ($prmNode->childNodes as $child) {
            if ($child->nodeType === XML_CDATA_SECTION_NODE || $child->nodeType === XML_TEXT_NODE) {
                $cdataContent .= $child->nodeValue;
            }
        }

        return $cdataContent;
    }

    /**
     * CDATAコンテンツを再構築してprm要素に置き換えます。
     *
     * @param \DOMDocument $dom DOMドキュメント
     * @param \DOMNode $prmNode prm要素のDOMノード
     * @param \SimpleXMLElement $innerXml 変更されたinner XML
     *
     * @return string 完全なSOAP XML文字列
     */
    private function replaceCdataContent(\DOMDocument $dom, \DOMNode $prmNode, \SimpleXMLElement $innerXml): string
    {
        // Reconstruct the CDATA content
        $newCdataContent = $this->reconstructXml($innerXml);

        // Clear existing content
        while ($prmNode->hasChildNodes()) {
            $prmNode->removeChild($prmNode->firstChild);
        }

        // Create and append new CDATA section
        $cdata = $dom->createCDATASection($newCdataContent);
        $prmNode->appendChild($cdata);

        return $dom->saveXML();
    }

    /**
     * 条件に基づいて特定の親要素内の子要素を変更します。
     *
     * @param \SimpleXMLElement $xml ナビゲートするXML要素
     * @param string $parentPath 親要素へのパス
     * @param string $conditionPath 条件となる子要素のパス
     * @param string $conditionValue 条件となる値
     * @param string $targetPath 変更する子要素のパス
     * @param string|null $value 設定する値
     * @param bool $removeIfNull 値がnullの場合にノードを削除するかどうか
     */
    private function navigateAndSetValueWithCondition(
        \SimpleXMLElement $xml,
        string $parentPath,
        string $conditionPath,
        string $conditionValue,
        string $targetPath,
        ?string $value,
        bool $removeIfNull = true,
    ): void {
        // Navigate to parent elements
        $parentParts = explode('/', trim($parentPath, '/'));
        $current = $xml;

        // Navigate to the parent container
        for ($i = 0; $i < count($parentParts) - 1; $i++) {
            $part = $parentParts[$i];
            if (!isset($current->$part)) {
                // Parent path doesn't exist, create if value is not null
                if ($value === null && $removeIfNull) {
                    return;
                }
                $current = $current->addChild($part);
            } else {
                $current = $current->$part;
            }
        }

        // Get the parent element name
        $parentElementName = end($parentParts);

        // Find all parent elements with the specified name
        $matchingParent = null;
        foreach ($current->$parentElementName as $parentElement) {
            // Check if the condition matches
            $conditionElement = $parentElement->$conditionPath;
            if (isset($conditionElement) && (string) $conditionElement === $conditionValue) {
                $matchingParent = $parentElement;
                break;
            }
        }

        // If no matching parent found, create one if value is not null
        if ($matchingParent === null) {
            if ($value === null && $removeIfNull) {
                return;
            }

            // Create new parent element with condition
            $matchingParent = $current->addChild($parentElementName);
            $matchingParent->addChild($conditionPath, $conditionValue);
        }

        // Now set the target value
        if ($value !== null) {
            if (!isset($matchingParent->$targetPath)) {
                $matchingParent->addChild($targetPath, $value);
            } else {
                $matchingParent->$targetPath = $value;
            }
        } else {
            if ($removeIfNull) {
                // Remove the target element if it exists
                if (isset($matchingParent->$targetPath)) {
                    unset($matchingParent->$targetPath);
                }
            } else {
                // Just ensure the element exists
                if (!isset($matchingParent->$targetPath)) {
                    $matchingParent->addChild($targetPath);
                }
            }
        }
    }

    /**
     * パスをナビゲートし、必要に応じて要素を作成し、値を設定します。
     *
     * @param \SimpleXMLElement $xml ナビゲートするXML要素
     * @param string $path '/'で区切られたパス（例：'jyudenfree/free'）
     * @param string|null $value 設定する値
     * @param bool $removeIfNull 値がnullの場合にノードを削除するかどうか
     */
    private function navigateAndSetValue(\SimpleXMLElement $xml, string $path, ?string $value, bool $removeIfNull = true): void
    {
        $pathParts = explode('/', trim($path, '/'));
        $current = $xml;

        // Navigate through all parts except the last one
        for ($i = 0; $i < count($pathParts) - 1; $i++) {
            $part = $pathParts[$i];

            if (!isset($current->$part)) {
                // Don't create path if we're going to remove the node
                if ($value === null && $removeIfNull) {
                    return;
                }
                $current = $current->addChild($part);
            } else {
                $current = $current->$part;
            }
        }

        // Handle the last element
        $lastPart = end($pathParts);

        if ($value !== null) {
            if (!isset($current->$lastPart)) {
                // SimpleXML handles escaping automatically
                $current->addChild($lastPart, $value);
            } else {
                // Direct assignment handles escaping automatically
                $current->$lastPart = $value;
            }
        } else {
            if ($removeIfNull) {
                // Remove the node if it exists
                if (isset($current->$lastPart)) {
                    unset($current->$lastPart);
                }
            } else {
                // Just ensure the element exists
                if (!isset($current->$lastPart)) {
                    $current->addChild($lastPart);
                }
            }
        }
    }

    /**
     * SimpleXMLElementからXML宣言なしでXML文字列を再構築します。
     *
     * @param \SimpleXMLElement $xml 変換するXML要素
     *
     * @return string 宣言なしのXML文字列
     */
    private function reconstructXml(\SimpleXMLElement $xml): string
    {
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = false;
        $dom->loadXML($xml->asXML());

        // Save only the document element (without XML declaration)
        return $dom->saveXML($dom->documentElement);
    }
}
