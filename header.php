<?php

 $currentPage = basename($_SERVER['SCRIPT_NAME']);

 // English is the default; use Dutch when the URL contains ?lang=nl
$currentLanguage = ($_GET['lang'] ?? '') === 'nl' ? 'nl' : 'en';
?>


<!-- Menu bar -->
    <header class="header">
            <img src="/images/Sunny_Socks-logo.png" alt="Sunny Socks logo">
            <div class="header-page">
                <a href="/index.php" 
                class="<?= $currentPage === 'index.php' ? 'active' : '' ?> ">
                HOME</a>
                <a href="/Shop-page-folder/Shop-page-collections.php" 
                class="<?= $currentPage === 'Shop-page-collections.php' ? 'active' : '' ?> ">
                SHOP</a>
                <a href="/order.php" 
                class="<?= $currentPage === 'order.php' ? 'active' : '' ?> ">
                ORDER</a>
                <a href="/About_us.php" 
                class="<?= $currentPage === 'About_us.php' ? 'active' : '' ?> ">
                ABOUT</a>
            </div>

            <!-- Also needs some php to be able to count the items-->
            <div class="header-button">
                <div class="header-button-basket">
                    <a href="/order.php" class="header-basket-link">
                        <img src="/images/cart.svg" alt="" width="32">
                        <span>Basket</span>
                        <span class="header-basket-count">0</span>
                    </a>
                </div>

                <div>
                    <a href="#" class="header-button-moon">
                        <span>🌙</span>
                    </a>
                </div>
                <!-- Language change -->
                <details class="header-language">
                    <summary class="header-language-summary">
                        🌐 <?= strtoupper($currentLanguage) ?>
                    </summary>

                    <div class="header-language-options">
                        <a href="?lang=en"
                        class="<?= $currentLanguage === 'en' ? 'active' : '' ?>">
                            🇬🇧 English
                        </a>

                        <a href="?lang=nl"
                        class="<?= $currentLanguage === 'nl' ? 'active' : '' ?>">
                            🇳🇱 Nederlands
                        </a>
                    </div>
                </details>

                <button type="button" class="header-search-button" id="openSearch">
                    <span aria-hidden="true">🔍</span>
                    <span>SEARCH</span>
                </button>

            </div>
    </header>
    
    <div class="header-search-panel" id="searchPanel" hidden>
        <div class="header-search-row">
            <span class="header-search-icon" aria-hidden="true">🔍</span>

            <input
                type="search"
                id="searchInput"
                class="header-search-input"
                placeholder="What socks are you looking for?"
                aria-label="Search for socks"
            >

            <button type="button" class="header-search-close" id="closeSearch">
                ✕ CLOSE
            </button>
        </div>

        <div class="header-popular-searches">
            <p>POPULAR SEARCHES</p>

            <div class="header-search-tags">
                <button type="button">MERINO</button>
                <button type="button">ATHLETIC</button>
                <button type="button">HIKING</button>
                <button type="button">COZY</button>
                <button type="button">ANKLE</button>
                <button type="button">COMPRESSION</button>
            </div>
        </div>
    </div>
    
<script>
    // Find the SEARCH button using its HTML id.
    const openSearch = document.getElementById("openSearch");

    // Find the CLOSE button.
    const closeSearch = document.getElementById("closeSearch");

    // Find the whole search panel.
    const searchPanel = document.getElementById("searchPanel");

    // Find the search input field.
    const searchInput = document.getElementById("searchInput");

    // Wait for the user to click the SEARCH button.
    openSearch.addEventListener("click", function () {
        // Show the search panel.
        searchPanel.hidden = false;

        // Tell screen readers that the panel is open.
        openSearch.setAttribute("aria-expanded", "true");

        // Put the typing cursor in the search field.
        searchInput.focus();
    });

    // Wait for the user to click the CLOSE button.
    closeSearch.addEventListener("click", function () {
        // Hide the search panel.
        searchPanel.hidden = true;

        // Tell screen readers that the panel is closed.
        openSearch.setAttribute("aria-expanded", "false");

        // Put keyboard focus back on the SEARCH button.
        openSearch.focus();
    });
</script>