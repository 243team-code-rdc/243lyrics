$(document).ready(function () {
    $("#actions").click(function () {
        swal("Que voulez-vous ajouter?", {
            buttons: {
                catch: {
                    text: "piece",
                    value: "catch",
                },
                commande: true,
                produit: true,
            },
        }).then((value) => {
            switch (value) {

            case "commande":
                window.location.replace("?uzb=add_c");
                break;
            case "produit":
                window.location.replace("?uzb=add_p");
                break;

            case "catch":
                window.location.replace("?uzb=add_pf");
                break;

            default:
                //window.location.replace("?uzb=add_p");
            }
        });

    });
    $("#archves").click(function () {
        swal("Que voulez-vous conslter?", {
            buttons: {
                catch: {
                    text: "piece",
                    value: "catch",
                },
                commande: true,
                produit: true,
                codes: true,
            },
        }).then((value) => {
            switch (value) {

            case "commande":
                window.location.replace("?uzb=arch_cm");
                break;
            case "codes":
                window.location.replace("?uzb=arch_cd");
                break;
            case "produit":
                window.location.replace("?uzb=arch_p");
                break;

            case "catch":
                window.location.replace("?uzb=arch_pf");
                break;

            default:
                //window.location.replace("?uzb=add_p");
            }
        });
    })

    $(".add-to-cart-btn").click(function () {
        var id_p=$(this).attr('id');
        console.log(id_p);
        $.ajax({
            type:'post',
            url:'checksomes/add_to_card.php',
            data:{'id_prod':id_p},
            success:function (data) {

                if(data==true)
                {
                    swal('Message panier',"Produit ajouter au panier",'success');
                    setTimeout(function () {
                        window.location = "?uzb=panier";
                    },1500);

                }
                else
                {
                    swal('Message panier',data,'error');
                }



            }
        })
    });
    $("#confirmer_achat").click(function () {
        alertify.confirm('Confirmation achat',"Etes-vous sur de vouloir acheter ?",
            function(){
                $.ajax({
                    type:'post',
                    url:'checksomes/confirmer_achat.php',
                    data:{},
                    success:function (data) {
                        if(data=="false 2")
                        {
                            if(!alertify.errorAlert){
                                //define a new errorAlert base on alert
                                alertify.dialog('errorAlert',function factory(){
                                    return{
                                        build:function(){
                                            var errorHeader = '<span class="fa fa-times-circle fa-2x" '
                                                +    'style="vertical-align:middle;color:#e10000;">'
                                                + '</span> Erreur ';
                                            this.setHeader(errorHeader);
                                        }
                                    };
                                },true,'alert');
                            }

                            alertify
                                .errorAlert("Veuiller rajouter des element a votre panier ! <br/><br/><br/>" +
                                    "Pour ajouter cliquer ici: " +
                                    "<a href='welcome'>cliquer voir different produit </a>");
                        }
                        else if(data=="false 1")
                        {
                            if(!alertify.errorAlert){
                                //define a new errorAlert base on alert
                                alertify.dialog('errorAlert',function factory(){
                                    return{
                                        build:function(){
                                            var errorHeader = '<span class="fa fa-times-circle fa-2x" '
                                                +    'style="vertical-align:middle;color:#e10000;">'
                                                + '</span> Identificaion ';
                                            this.setHeader(errorHeader);
                                        }
                                    };
                                },true,'alert');
                            }

                            alertify
                                .errorAlert("Veuiller creer un compte ou se connecter ! <br/><br/><br/>" +
                                    "Pour ajouter cliquer ici: " +
                                    "<a href='welcome/login'>cliquer pour s'identifier </a>");
                        }
                        else if(!isNaN(data))
                        {
                            if(!alertify.myAlert) {

                                alertify.alert('Message achat', "Merci pour votre pre-achat votre code est " + data + ".<a href='?uzb=arch_cd'> cliquer pour Voir vos codes</a>", function () {
                                    window.location.reload(true);
                                });
                                //define a new dialog
                            }
                        }
                    }
                });

            },
            function(){
                alertify.error('annuler');
            });

    });
    $("#confirmer_achat2").click(function () {
        alertify.confirm('Confirmation achat',"Etes-vous sur de vouloir acheter ?",
            function(){
                $.ajax({
                    type:'post',
                    url:'checksomes/confirmer_achat.php',
                    data:{},
                    success:function (data) {
                        if(data=="false 2")
                        {
                            if(!alertify.errorAlert){
                                //define a new errorAlert base on alert
                                alertify.dialog('errorAlert',function factory(){
                                    return{
                                        build:function(){
                                            var errorHeader = '<span class="fa fa-times-circle fa-2x" '
                                                +    'style="vertical-align:middle;color:#e10000;">'
                                                + '</span> Erreur ';
                                            this.setHeader(errorHeader);
                                        }
                                    };
                                },true,'alert');
                            }

                            alertify
                                .errorAlert("Veuiller rajouter des element a votre panier ! <br/><br/><br/>" +
                                    "Pour ajouter cliquer ici: " +
                                    "<a href='welcome'>cliquer voir different produit </a>");
                        }
                        else if(data=="false 1")
                        {
                            if(!alertify.errorAlert){
                                //define a new errorAlert base on alert
                                alertify.dialog('errorAlert',function factory(){
                                    return{
                                        build:function(){
                                            var errorHeader = '<span class="fa fa-times-circle fa-2x" '
                                                +    'style="vertical-align:middle;color:#e10000;">'
                                                + '</span> Identificaion ';
                                            this.setHeader(errorHeader);
                                        }
                                    };
                                },true,'alert');
                            }

                            alertify
                                .errorAlert("Veuiller creer un compte ou se connecter ! <br/><br/><br/>" +
                                    "Pour ajouter cliquer ici: " +
                                    "<a href='welcome/login'>cliquer pour s'identifier </a>");
                        }
                        else if(!isNaN(data))
                        {
                            if(!alertify.myAlert) {

                                alertify.alert('Message achat', "Merci pour votre pre-achat votre code est " + data + ".<a href='?uzb=arch_cd'> cliquer pour Voir vos codes</a>", function () {
                                    window.location.reload(true);
                                });
                                //define a new dialog
                            }
                        }
                    }
                });

            },
            function(){
                alertify.error('annuler');
            });

    });
    $(".delete").click(function () {
        var id=$(this).attr('id');
        alertify.confirm('valider suppresion',"Etes-vous sur de vouloir supprimer?",
            function(){
                $.ajax({
                    type:'post',
                    url:'checksomes/delete_panier.php',
                    data:{'id_prod':id},
                    success:function (data) {
                        alertify.success(data);
                        window.location.reload(true)
                    }
                });

            },
            function(){
                alertify.error('annuler');
            });

    });
    $('.fa-trash').click(function () {
        var id=$(this).attr('id');
        alertify.confirm('uzabintu confirmation',"Etes-vous sur de vouloir supprimer ?",
            function(){
                $.ajax({
                    type:'post',
                    url:'checksomes/delete.php',
                    data:{'id_prod':id},
                    success:function (data) {
                        //console.log(id);
                        alertify.success(data);
                        window.location.reload(true);

                    }
                });

            },
            function(){
                alertify.error('annuler');
            });

    });
    $(".newsletter-btn").click(function () {
        $.ajax({
            type:'post',
            url:'checksomes/news_abnnement.php',
            data:{'email':$("#email_news").val()},
            success:function (data) {
                //console.log(id);
                if(data=="vous etes inscrit au newsletter")
                {
                    swal("uzabintu newsletters", "Félicitations vous venez de souscrire aux newsletters de uzabintu vous recevrez des annonces des produits via votre adresse mail.", "success");
                }
                else
                {
                    swal("uzabintu newsletters",data,'error');
                }


                //window.location.reload(true);

            }
        });
    });
    /*
     $("#recuperation").click(function () {

     var pre = document.createElement('pre');
     //custom style.
     pre.style.maxHeight = "400px";
     pre.style.margin = "0";
     pre.style.padding = "24px";
     pre.style.whiteSpace = "pre-wrap";
     pre.style.textAlign = "justify";
     pre.appendChild(document.createTextNode($('#la').text()));
     //show as confirm
     alertify.confirm(pre, function(){
     alertify.success('Accepted');
     },function(){
     alertify.error('Declined');
     }).set({labels:{ok:'Accept', cancel: 'Decline'}, padding: false});
     })
     */
});