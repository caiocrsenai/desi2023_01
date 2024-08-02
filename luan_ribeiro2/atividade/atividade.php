<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <title>Classes Flexbox</title>
</head>

<style>
.caixa{
    /* background-color: #f5f5f5; */
    height: 150px;
}
.item{
    /* border: 1px solid black; */
    padding: 5px;
}
.item2{
    background-color: white;
    color: white;
}
.item3{
    margin-right: 700px;
    width: 100px;
    height: 100px;
}



</style>

<body>
<script src="bot/bootstrap.min.js"> </script>
<nav class="navbar navbar-expand-sm navbar-dark "style="background-color: #4CBB17;">
        <a href="" class="navbar-brand">FILMES PONTO COM</a>
        <!-- Menu Hamburguer -->

        <button class="navbar-toggler" data-toggler="collapse" data-target="#navegacao">
            <span class="navbar-toggler-icon">

            </span>
        </button>
        <!-- Navegação -->
        <div class="collapse navbar-collapse" id="navegacao">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Veja relacionados</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">sair</a>
                </li>
            </ul>
        </div>


    </nav>
    <br><br>
    <div class="container">
        <h2 > Os sem-florestas </h2>
        <div class="caixa d-flex justify-content-between">
                <div class="item aling-self-center" >A primavera chegou, o que faz com que os animais da floresta despertem da hibernação. Ao acordar eles logo têm uma surpresa: surgiu ao redor de seu habitat natural uma grande cerca verde. Inicialmente eles temem o que há por detrás da cerca, até que RJ (Bruce Willis) revela que foi construída uma cidade ao redor da floresta em que vivem, que agora ocupa apenas um pequeno espaço. </div>
                <div class="item2" >aaa</div>
                <div class="item aling-self-end">RJ diz ainda que no mundo dos humanos há as mais diversas guloseimas, convencendo os demais a atravessar a cerca. Entretanto esta atitude desagrada o cauteloso Verne (Garry Shandling), que achava melhor permanecer onde estavam inicialmente. </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <div class="caixa d-flex justify-content-between">
                <div class="item2" >aaaaaaaaaaaaaaaaaaa</div>
                <div class="item3"><img src="img/floresta.jpg"></div>
        </div>
    </div>
    
</body>
</html>