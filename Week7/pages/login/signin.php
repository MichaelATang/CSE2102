<form class="form-signin" action="functions/login/signin_scr.php" method="post" enctype="application/x-www-form-urlencoded" name="signin">
    <img class="mb-4" src="./assets/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1>Welcome to CSE2102 </h1>
    <h1 class="h3 mb-3 font-weight-normal">To proceed, please login.</h1>
    <fieldset>
        <hr class="colorgraph">
        <input type="email" name="email" id="email" class="form-control input-lg" required placeholder="Email Address">
        <input type="password" name="password" id="password" class="form-control input-lg" required placeholder="Password">
        <hr class="colorgraph">
        <!-- <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign In"> -->
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Login">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </fieldset>
</form>