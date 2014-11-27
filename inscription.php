<?php include("header.php"); ?>


<div class="container"
>    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 well well-sm">
            <legend><a href="http://www.jquery2dotnet.com"><i class="glyphicon glyphicon-globe"></i></a> Sign up!</legend>
            <form action="#" method="post" class="form" role="form">
            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" name="prenom" placeholder="Prenom" type="text"
                        required autofocus />
                </div>
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" name="nom" placeholder="Nom" type="text" required />
                </div>
            </div>

            <input class="form-control" name="password" placeholder="Votre mot de passe" type="password" /> 
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Rejoindre la bataille</button>
            </form>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>