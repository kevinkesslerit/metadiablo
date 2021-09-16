
<footer class="footer text-md-left text-center p-0 text-muted bg-metadark">

<div class="navbar navbar-expand navbar-dark bg-metadark borderx-darker">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav col col-md-4 d-flex justify-content-start">
        </ul>
        <ul class="navbar-nav pr-0 col-4 justify-content-center">
            <li class="nav-item">
                <!--<a class="navbar-brand" href="{{ url('/') }}">-->
                    <!--img class="d-block m-0" src="{{ asset('img/logo240x60.png') }}" alt="logo">-->
                    <img src="{{ asset('img/items/dss.png') }}" alt="Soulstone-Icon"/>
                <!--</a>-->
            </li>
        </ul>
        <ul class="navbar-nav col col-md-4 d-flex justify-content-end">
            <li class="nav-item">
            </li>
        </ul>
    </div>
</div>

    <div class="footwrap">
        <div class="col">
            <div class="d-flex mb-1 container">
                <div class="row mx-auto mt-4">
                    <div class="col-12 text-center">
                        <!--<span class="h4 footlogo">
                            <img src="{{ asset('img/logo240x60.png') }}" class="d-inline-block align-bottom mb-1" alt="metadiablologo"/>
                        </span>-->

                        <!-- START social 
                        <p class="social mt-2">
                                <a target="_blank" href="https://discord.gg/aM5rt2S"><i class="fab fa-discord fa-2x icon-outline" style="color: #7289DA;"></i></a>
                                <a target="_blank" href="https://www.facebook.com/MetaDiablo"><i class="fab fa-facebook-square fa-2x icon-outline" style="color: #3b5998;"></i></a>
                                <a target="_blank" href="https://www.youtube.com/channel/UCavDwFiHA2dCANS6iabQhUw/"><i class="fab fa-youtube fa-2x icon-outline" style="color: #c4302b;"></i></a>
                        </p>
                         END social -->
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-copyright text-center mt-1 m-0 p-0 pb-4 small container mx-auto">
        <p class="mt-1">
            <a href="https://www.blizzard.com/en-us/?ref=metadiablo.com" target="_blank">
                <img src="{{ asset('img/logo-blizz-dev-hover.png') }}" alt="6112-logo"/>
            </a>
        </p>
        <div class="footer-links text-uppercase">
            <a href="{{ route('apidocs') }}" class="footer-link">API</a>
            <a href="{{ route('credits') }}" class="footer-link">&nbsp;Credits</a>
            <a href="{{ route('about') }}" class="footer-link">&nbsp;About Us</a>
        </div>
        <p class="font-weight-bold lead">Don't have Diablo II yet? Get it <a href="https://www.blizzard.com/en-us/games/d2/?ref=metadiablo.com" target="_blank">here</a>.</p>
        <p>&copy; {{ now()->year }} <a href="https://mivirtualsolutions.com" target="_blank">Virtual Solutions</a> All Rights Reserved.</p>
        
        <div class="footer-links-small text-uppercase small">
            <a href="{{ route('privacy') }}" class="footer-link-small">Privacy</a>
            <a href="{{ route('terms') }}" class="footer-link-small">&nbsp;Terms</a>
        </div>
<!--
<p><a href="https://www.patreon.com/bePatron?u=27068064" data-patreon-widget-type="become-patron-button">Become a Patron!</a><script async src="https://c6.patreon.com/becomePatronButton.bundle.js"></script>
</p>
<p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick" />
<input type="hidden" name="hosted_button_id" value="CFA8L83QKHL2J" />
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
</form>
</p>-->
            <p class="text-muted">
                Diablo&reg; and Blizzard Entertainment&reg; are trademarks or registered trademarks of Blizzard Entertainment in the United States and/or other countries.
                <br>These terms and all related materials, logos, and images are copyright &copy; Blizzard Entertainment. This site is in no way associated with or endorsed by Blizzard Entertainment&reg;.</p>

        </div>
    </div>
</footer>