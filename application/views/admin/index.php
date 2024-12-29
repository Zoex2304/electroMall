<main class="container">
  <?= $sidebar; ?>
  <div id="main-view">
    <div class="navbar-admin">
      <div class="admin-info">
        <div class="vertical-divider"></div>
        <p class="admin-name"><?= $userCredentials['user_name']; ?></p>
        <div class="admin-picture">
          <img src="<?= base_url('assets/'); ?>background/defaultadmin.svg" alt="">
        </div>
      </div>
    </div>
    <div class="jumbotron">
      <h1>Welcome, <?= $userCredentials['user_name']; ?>! <br> Checks out, whats going on today <br><a id="jumptodashboard" href="">Jump to Dashboard</a></h1>
      <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
      <dotlottie-player src="https://lottie.host/5f21ceaa-e2ad-4bce-ae64-c2de2f41a80f/iR2gfLNFaw.lottie" background="transparent" speed="1" style="width: 300px; height: 300px" loop autoplay></dotlottie-player>
    </div>
  </div>
</main>