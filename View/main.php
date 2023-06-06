<!DOCTYPE html>
<?php
require_once '../php/patientDAO.php';
require_once '../php/MedicDao.php';

$medicDAO = new MedicDAO();
$patientDAO = new PatientDAO();
$surgeryData = $patientDAO->getSurgeriesLastThreeMonths();
$doctorNames = $patientDAO->DoctorNames();
$insuranceNames = $patientDAO->InsuranceNames();

?>

<html>
<head>
    <meta charset='utf-8'>
    <link rel="icon" type="image/x-icon" href="../Components/SVG/favicon-16x16.png">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/main.css'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
   <?php
        include ('./sidebar.html')
   ?>

    <section class="home">
        <div class="title">
            <div class="stick"></div>
            <div class="text-menu">Dashboard</div>
        </div>
        <div class="text-h2">Seja bem vinda, User.</div>


        <div class="content-form">

            <div class="initial-content">

            <div class="s-content" id="medicos">
                <div class="flex-itens">
                    <h2>Médicos</h2>
                    <select name="medico" id="medico" class="sel-med">
                        <option disabled selected>Selecione o Médico</option>
                        <?php foreach ($doctorNames as $name) { ?>
                            <option value="<?= $name ?>"><?= $name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <h2 id="nomeMedico"></h2>
                <h4 id="numeroCirurgias"></h4>
            </div>


            <div class="s-content" id="convenio">
                <div class="flex-itens">
                    <h2>Convênio</h2>
                    <select name="insurance" id="insurance" class="sel-med">
                        <option disabled selected>Selecione o Convenio</option>
                        <?php foreach ($insuranceNames as $name) { ?>
                            <option value="<?= $name ?>"><?= $name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <h2 id="nomeInsurance"></h2>
                <h4 id="numeroICirurgias"></h4>
            </div>


            <div class="s-content" id="updates">
                    <h2>Juazeiro do Norte</h2>
            </div>

        </div>


            <div class="mid-content">

                <div class="m-content" id="total-c">
                    <h2>Cirurgias Realizadas</h2>
                    <canvas id="surgeryChart"></canvas>
                </div>

                <div class="mm-content" id="cirurgias">
                    <h2>Procedimentos</h2>
                    <h4>Total Cirurgias</h4>
                    <canvas id="surgeryChart"></canvas>
                </div>

            </div>


            <div class="end-content">
                <div class="e-content" id="gadtos">
                    <h2>Gastos Totais</h2>  
                    <h4>Com cirurgias</h4>
                </div>
            </div>




        </div>


    </section>


<!-- Script para pegar quantidad de cirurgias por medico -->
    <script>
        var selectMedico = document.getElementById('medico');
        var h2NomeMedico = document.getElementById('nomeMedico');
        var divNumeroCirurgias = document.getElementById('numeroCirurgias');

        selectMedico.addEventListener('change', function() {
            var selectedMedico = selectMedico.value;

            // Atualizar o nome do médico
            h2NomeMedico.textContent = selectedMedico;

            // Consultar o número de cirurgias cadastradas no nome do médico
            fetch('../php/ajax_get_cirurgias.php?medico=' + encodeURIComponent(selectedMedico))
                .then(response => response.json())
                .then(data => {
                    // Atualizar o número de cirurgias
                    divNumeroCirurgias.textContent = 'Número de Cirurgias: ' + data.count;
                })
                .catch(error => {
                    console.error('Erro ao obter o número de cirurgias:', error);
                });
        });

    </script>

<!-- Script para pegar quantidad de convenio por paciente -->
<script>
    var selectInsurance = document.getElementById('insurance');
    var h2NomeInsurance = document.getElementById('nomeInsurance');
    var divNumeroICirurgias = document.getElementById('numeroICirurgias');

    selectInsurance.addEventListener('change', function() {
        var selectedInsurance = selectInsurance.value;

        // Atualizar o nome do convênio
        h2NomeInsurance.textContent = selectedInsurance;

        // Consultar o número de cirurgias cadastradas no convênio
        fetch('../php/ajax_get_insurance_cirurgias.php?insurance=' + encodeURIComponent(selectedInsurance))
            .then(response => response.json())
            .then(data => {
                // Atualizar o número de cirurgias
                divNumeroICirurgias.textContent = 'Número de Cirurgias: ' + data.count;
            })
            .catch(error => {
                console.error('Erro ao obter o número de cirurgias:', error);
            });
    });
</script>


<!-- Grafico de Cirurgias por meses -->
<script>
    var surgeryData = <?php echo json_encode($surgeryData); ?>;

    var months = surgeryData.map(function(item) {
        return item.month;
    });

    var surgeryCount = surgeryData.map(function(item) {
        return item.count;
    });

    var ctx = document.getElementById('surgeryChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Quantidade de Cirurgias',
                data: surgeryCount,
                backgroundColor: 'rgba(123, 123, 255, 0.5)'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });
</script>

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