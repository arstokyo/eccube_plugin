import React, { useState } from "react";

function MadeWithLove(): React.JSX.Element {
    const [heart, setHeart] = useState(1);

    const incrementHeart = () => setHeart((prevHeart) => prevHeart + 1);

    return (
        <div>
            <span>Build with </span>
            <span onClick={incrementHeart}>{'❤️'.repeat(heart)}</span>
        </div>
    );
}

export default MadeWithLove;