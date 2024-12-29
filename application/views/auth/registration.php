<main>
<div class="container" id="registration-window">
  <div class="left-panel">
    <video autoplay muted loop playsinline class="background-video">
      <source src="/themarketplace/assets/background/chain.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <div class="content">

    </div>
  </div>

  <div class="right-panel">
    <h2>Next-Generation Creative Store</h2>
    <h6 style="margin-bottom: 2.6rem;">THEMARKETPLACE | SPARK YOUR IMAGINATION</h6>
    <form id="register-form" action="<?= base_url('auth/registration'); ?>" method="post">

      <div class="form-control">
        <input type="text" value="<?= set_value('user_name'); ?>" name="user_name" placeholder="" />
        <span class="placeholder-input">Username</span>
        <small><?= form_error('user_name'); ?></small>
      </div>

      <div class="form-control">
        <input type="text" value="<?= set_value('user_email'); ?>" name="user_email" placeholder="" />
        <span class="placeholder-input">Enter email address</span>
        <small><?= form_error('user_email'); ?></small>
      </div>
      <div class="form-control">
        <input type="password" id="user_password" name="user_password" placeholder="" />
        <span class="placeholder-input">Password</span>
        <small><?= form_error('user_password'); ?></small>
      </div>
      <div class="form-control">
        <input type="password" id="confirm-password" name="user_password_confirm" placeholder="" />
        <span class="placeholder-input">Confirm Password</span>
      </div>


      <p style="text-align: end; margin: .5rem 0 1.5rem ;">Have an account? <a href="<?= base_url(); ?>">Log in</a></p>
      <button type="submit">NEXT</button>
    </form>
  </div>
</div>
</main>