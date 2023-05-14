<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <link rel="icon" type="image/x-icon" href="../Components/SVG/favicon-16x16.png">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/room-register.css'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

    <!-- --------------- Menu Sidebar --------------- -->
    <?php
        include ('./sidebar.html')
    ?>

     <!-- --------------- Conteudo Principal --------------- -->

    <section class="home">
        <div class="title">
            <div class="stick"></div>
            <div class="text-menu">Cadastro</div>
        </div>
        <div class="text-h2">Salas</div>

        <!-- --------------- InputFields --------------- -->
        <div class="content-form">
                <form method="POST" action="#" class="form">

                    <div class="procedure-flex">

                        <div class="room-choose">

                            <div class="flex-content">
                                <label class="tx" >Nome da Sala <span>*</span></label>
                                <input name="" id="" class="name" placeholder="Ex.: Sala 1 ">
                            </div>
                            <div class="flex-content">
                                <label class="tx">Localidade da Sala <span>*</span></label>
                                <input type="text" name="" id="" placeholder="Ex.: 2° Corredor, 3° Andar" class="locate">
                            </div>

                        </div>

                        <div class="surgery-type">
                            <label class="tx-proc">Tipo de Cirurgia</label>
                            
                            <div class="check-proc">
                                <div class="checkbox"><input type="checkbox" name="" id=""> <label for="">Urologica</label></div>
                                <div class="checkbox"><input type="checkbox" name="" id=""> <label for="">oftalmológicas</label></div>
                                <div class="checkbox"><input type="checkbox" name="" id=""> <label for="">neurológicas</label></div>
                                <div class="checkbox"><input type="checkbox" name="" id=""> <label for="">ortopédicas</label></div>
                                <div class="checkbox"><input type="checkbox" name="" id=""> <label for="">Cardíacas</label></div>
                                <div class="checkbox"><input type="checkbox" name="" id=""> <label for="">Gastrointestinais</label></div>
                                <div class="checkbox"><input type="checkbox" name="" id=""> <label for="">Plásticas</label></div>
                            </div>
                        </div>

                    </div>
                    
                    <div class="flex-content">
                        <label class="label-form"   for="endereco">Descrição <span>*</span></label>
                        <textarea type="text" name="endereco" id="endereco" required placeholder="Ex.: Sala número 2, utilizada para procedimentos cardíacos e pediátrico." class="input-form-wd"></textarea>
                    </div>

                    <div class="btn-form"><button type="submit" class="btn-submit">Salvar</button></div>
                  </form>
                  
        </div>

    </section>

    <!-- --------------- Sscript do menu Sidebar --------------- -->

    <script>
            
            const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");
            toggle.addEventListener("click" , () =>{
                sidebar.classList.toggle("close");
            })
            searchBtn.addEventListener("click" , () =>{
                sidebar.classList.remove("close");
            })

    </script>

</body>
</html>