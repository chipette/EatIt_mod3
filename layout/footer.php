<!-- ici j'ai la fermetures des balises "main" et "body" -->

</main>

<footer class="main-footer">
    <section class="container">
        <article>
            <div class="logo">
                <i class="fa fa-heartbeat"></i>
                Salutem
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus debit</p>
        </article>
        <article>
            <h3>Nous contacter</h3>
            <ul class="contact-infos">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:contact@salutem.fr">contact@salutem.fr</a>
                </li>
                <li>
                    <i class="fa fa-phone"></i>
                    <a href="tel:0243785462">0243785462</a>
                </li>
                <li>
                    <i class="fa fa-ambulance"></i>
                    <a href="tel:0243785443">0243785443</a>
                </li>
            </ul>
        </article>
        <article>
            <h3>Horaires d'ouverture</h3>
                <!-- ici je fais appelle au fichier qui contient le tableau des horaires et jours d'ouvertures -->
                <?php include __DIR__ . "/../include/horaires_inc.php"; ?>
        </article>
    </section>
</footer>

</body>
</html>

