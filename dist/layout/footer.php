<!-- ici j'ai la fermetures des balises "main" et "body" -->

    </main>

    <footer>
      <div class="container">

        <div class="footer_top">
          <div class="logo_infos" id="contact">
            <a href="index.html"><img src="images/logoBleu.svg" width="344" height="119" alt="logo"></a>
            <div class="infos">
              <p>09 76 11 29 15</p>
              <p>info@eatit.com</p>
            </div>
          </div><!--/logo_infos -->  

          <ul class="navbar-nav social_nav">
            <?php foreach ($reseaux_sociaux as $reseau_social) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $reseau_social["url"]; ?>" target="blank" title="Suivez-nous sur <?= $reseau_social["nom"]; ?>"
                        <i class="fa <?= $reseau_social["icone"]; ?>"></i>
                    </a><span class="sr-only"><?= $reseau_social["nom"]; ?></span>
                </li>
            <?php endforeach; ?>
          </ul>
        </div><!--/footer_top-->
        
        <div class="sep"></div>

        <ul class="navbar-nav footer_nav">
          <li class="nav-item">
            <a class="nav-link" href="#eatEcolo">Nos valeurs</a>
          </li>
          <li class="nav-item ml">
            <a class="nav-link" href="#restos">Nos restaurants partenaires</a> 
          </li>
          <li class="nav-item ml">
            <a class="nav-link" href="#">Recrutement</a>
          </li>
          <li class="nav-item ml">
            <a class="nav-link" href="#">Politique de confidantialité</a> 
          </li>
        </ul>

          <p class="text-center sign">mathus©harline - 2019 - <a href="#">mentions légales</a></p>
      </div><!--/container -->
    </footer>



  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>

</body>

</html>

