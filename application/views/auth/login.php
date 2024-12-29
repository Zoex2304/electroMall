<?= $this->session->flashdata('message'); ?>
<main>
  <div class="container">
    <div class="logo"><img src="<?= base_url('assets/') ?>background/electro-logo.svg" alt=""></div>
    <div class="left-panel" id="login-left-panel">
      <video autoplay muted loop playsinline class="background-video">
        <source src="<?= base_url('assets/'); ?>background/logs.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>

    <div class="right-panel">
      <h2>Welcome Back </h2>
      <p style="margin-bottom: 3rem;">complete your login and start find cool stuff</p>
      <form id="login-form" action="<?= base_url('auth'); ?>" method="post">

        <div class="form-control">
          <input type="text" value="<?= set_value('user_email'); ?>" id="user_name" name="user_email" placeholder="">
          <span class="placeholder-input">Enter email address</span>
          <small><?= form_error('user_email'); ?></small>
        </div>

        <div class="form-control">
          <input type="password" id="user_password" name="user_password" placeholder="">
          <span class="placeholder-input">Password</span>
          <small><?= form_error('user_password'); ?></small>
        </div>

        <p style="color: red; text-align: center;"></p>
        <span style="margin-left: auto; margin-bottom: 2rem;">Don't have an Account? <a href="<?= base_url('auth/'); ?>registration">Register</a></span>
        <button type="submit">Log in</button>
      </form>
    </div>
  </div>
</main>