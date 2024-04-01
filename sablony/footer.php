<footer id="footer" class="container-fluid pt-4 pb-2">
  <div class="container d-flex justify-content-evenly my-4">
    <div class="d-flex flex-column">
      <h2 class="fs-6 fw-bold">Zoznam stránok:</h2>
      <ul class="list-unstyled">
        <?php echo html_nav($GLOBALS["ODKAZY"]); ?>
      </ul>
    </div>
    <div class="d-flex flex-column">
      <h2 class="fs-6 fw-bold">Zdroje obrázkov:</h2>
      <a href="https://openai.com/dall-e-3" class="text-decoration-none" target="_blank">DALL&bullet;E 3</a>
      <a href="https://unsplash.com" class="text-decoration-none" target="_blank">Unsplash</a>
    </div>

    <div class="align-self-center text-center">
      <p>&copy; Kevin Svitač <?php echo date('Y'); ?>. Všetky práva vyhradené.</p>
      <p><i>Táto stránka je súčasťou projektu pre predmet "Skriptovacie jazyky" na UKF.</i></p>
    </div>
  </div>
</footer>
<script src="assets/js/app.js"></script>
</body>

</html>