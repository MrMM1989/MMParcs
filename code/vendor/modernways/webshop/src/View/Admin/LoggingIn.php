<div class="floor" id="second-floor">
    <div class="control-panel">
        <a href="<?php echo htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES);?>" class="tile _14x1">
            <span class="icon-menu2"></span>
            <span class="screen-reader-text">Home</span>
        </a>
        <h1>Aanmelden</h1>
    </div>
    <form class="showroom" action="<?php echo htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES);?>" method="post">
        <header>
            <h2>Login</h2>
            <div id="command-panel" class="command-panel">
                <button type="submit" value="Admin-Login" name="uc">
                    <span class="icon-paperplane"></span><span class="screen-reader-text">Aanmelden</span></button>
                <a href="<?php echo htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES);?>?uc=Home-Admin">
                    <span class="icon-close"></span><span
                        class="screen-reader-text">Sluiten</span></a>
            </div>

        </header>
        <div class="list">
        </div>
        <div class="detail">
            <fieldset>
                <div>
                    <label for="User-UserName">Gebruikersnaam</label>
                    <input id="User-UserName" name="User-UserName" class="text" type="text" required />
                </div>
                <div>
                    <label for="User-Password">Paswoord</label>
                    <input id="User-Password" name="User-Password" type="password" required />
                </div>
            </fieldset>
        </div>
        <div class="feedback">
        </div>
    </form>
</div>