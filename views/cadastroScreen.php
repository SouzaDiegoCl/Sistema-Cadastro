<!-- Imports -->
<?php
include("blades/header.php");
include("../models/conexao.php");
include("../controllers/validarCpf.php");
include("../controllers/validarEmail.php");
include("../controllers/validarCep.php");
/* validate */
$fullName = $email = $cpf = $dataNascimento = $idade = $tel = $estadoCivil = $rua = $bairro = $cep = $cidade = $uf = "";
$genericError = $fullNameErr = $emailErr = $cpfErr = $dataNascimentoErr = $telErr = $estadoCivilErr = $ruaErr = $bairroErr = $cepErr = $cidadeErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /* Recebendo dados:  */
    $fullName = htmlspecialchars($_POST["inputFullName"]);
    $email = htmlspecialchars($_POST["inputEmail"]);
    $cpf = htmlspecialchars($_POST["inputCpf"]);
    $dataNascimento = htmlspecialchars($_POST["inputBirthDate"]);
    $tel = htmlspecialchars($_POST["inputTel"]);
    $estadoCivil = htmlspecialchars($_POST["inputEstadoCivil"]);
    $rua = htmlspecialchars($_POST["inputRua"]);
    $bairro = htmlspecialchars($_POST["inputBairro"]);
    $cep = htmlspecialchars($_POST["inputCep"]);
    $cidade = htmlspecialchars($_POST["inputCidade"]);
    $numero = htmlspecialchars($_POST["inputNum"]);

    /* Prevenção Campos vazios: */
    if (empty($fullName) || empty($email) || empty($cpf) || empty($dataNascimento) || empty($tel) || empty($estadoCivil) || empty($rua) || empty($bairro) || empty($cep) || empty($cidade) || empty($numero)) {
        $genericError = "*Preencha os campos vazios!";
    }

    /* Calculo idade*/
    $dataAtual = date('Y-m-d');
    $diferençaDatasAnos = date_diff(date_create($dataNascimento), date_create($dataAtual))->format('%y');
    $idade = $diferençaDatasAnos;

    /* Validação Nome: */
    //formatandoNome
    $fullName = strtoupper($fullName);
    if (strlen($fullName === 0)) {
        $fullNameErr = "*Insira um nome!";
    }
    if (!preg_match("/^[a-zA-Z' ]*$/", $fullName)) {
        $fullNameErr = "*Insira apenas letras e espaço!";
    }

    /* Validação email */
    if (strlen($email) === 0) {
        $emailErr = "*Insira um Email!";
    } else {
        $emailErr = validarEmail($email);
    }


    /* Validação CPF: */
    $cpfErr = validarCpf($cpf);

    /* Validação CEP */
    if (strlen($cep) < 9) {
        $cepErr = 'Caracteres insuficientes!';
    } else {
        $cepData = procurarCep($cep);
        $cepErr = validarCep($cepData);

        //Formatar Endereço
        $cidade = strtolower($cidade);
        $uf = $cepData->uf;
        $bairro = strtolower($bairro);
        $rua = strtolower($rua);
    }


    /* Inserção no banco de dados: */
    if (
        ($genericError == "") && ($fullNameErr == "") && ($emailErr == "") && ($cpfErr == "") && ($dataNascimentoErr == "") && ($telErr == "") && ($estadoCivilErr == "") && ($ruaErr == "") &&
        ($bairroErr == "") && ($cepErr == "")
    ) {
        $query = "INSERT INTO conta(Nome, DataNascimento,Cpf, Email, Telefone, EstadoCivil ,Cep, idade, Cidade, Uf, Bairro, Rua, Numero) 
        VALUES ('$fullName','$dataNascimento', '$cpf', '$email', '$tel', '$estadoCivil', '$cep', '$idade', 
        '$cidade', '$uf', '$bairro', '$rua', '$numero');";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $_POST = array();
    }
}
?>
<style>
    <?php include 'styles/style.css'; ?>
</style>

<!-- HTML -->
<div>
    <div>
        <h1 id="cadastroTitle">ClBank</h1>
    </div>
    <div class="p-4 pb-0 pt-0 bg-white" id="cadastroDivContainerContent">
        <form name="formDados" id="formDados" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>"
            method="POST">
            <div class="shadow border border-warning rounded p-0 d-flex flex-row justify-content-around flex-wrap">
                <!-- Column 1 -->
                <div>
                    <div class="row p-3 divInputText">
                        <div class="cadastroInputsDiv">
                            <label>Nome Completo:</label>
                            <input type="text" name="inputFullName" id="inputFullName"
                                placeholder="exemplo: Diego Baltazar"
                                value="<?php echo isset($_POST["inputFullName"]) ? $_POST["inputFullName"] : '' ?>"
                                required>
                            <span class="errorMessage">
                                <?php echo $fullNameErr; ?>
                            </span>
                        </div>
                    </div>
                    <div class="row p-3 divInputText">
                        <div class="cadastroInputsDiv">
                            <label>Email:</label>
                            <input type="email" name="inputEmail" id="inputEmail" placeholder="exemplo@gmail.com"
                                value="<?php echo isset($_POST["inputEmail"]) ? $_POST["inputEmail"] : '' ?>" required>
                            <span class="errorMessage">
                                <?php echo $emailErr; ?>
                            </span>
                        </div>
                    </div>
                    <div class="row p-3 divInputText">
                        <div class="cadastroInputsDiv">
                            <label>CPF:</label>
                            <input type="text" name="inputCpf" id="inputCpf" placeholder="000.000.000-00"
                                value="<?php echo isset($_POST["inputCpf"]) ? $_POST["inputCpf"] : '' ?>" required>
                            <span class="errorMessage">
                                <?php echo $cpfErr; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Column 2 -->
                <div>
                    <div class="row p-3 ps-0 divInputText">
                        <div class="col-8 ">
                            <div class="cadastroInputsDiv">
                                <label>Data de Nascimento:</label>
                                <input type="date" name="inputBirthDate" id="inputBirthDate"
                                    max="<?php echo date('Y-m-d'); ?> "
                                    value="<?php echo isset($_POST["inputBirthDate"]) ? $_POST["inputBirthDate"] : '' ?>"
                                    ;>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="cadastroInputsDiv">
                                <label>Idade:</label>
                                <input type="number" name="inputIdade" id="inputIdade"
                                    value="<?php echo isset($_POST["inputIdade"]) ? $_POST["inputIdade"] : '' ?>"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row p-3 divInputText  ">
                        <div class="cadastroInputsDiv">
                            <label>Telefone:</label>
                            <input type="tel" name="inputTel" id="inputTel" placeholder=""
                                value="<?php echo isset($_POST["inputTel"]) ? $_POST["inputTel"] : '' ?>" required>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="row p-3 divInputText">
                        <div class="cadastroInputsDiv">
                            <label>Estado Civil:</label>
                            <select class="form-select border-warning" name="inputEstadoCivil" id="inputEstadoCivil"
                                value="<?php echo isset($_POST["inputEstadoCivil"]) ? $_POST["inputEstadoCivil"] : '' ?>">
                                <option value="solteiro" disabled></option>
                                <option value="solteiro">Solteiro</option>
                                <option value="casado">Casado</option>
                                <option value="divorciado">divorciado</option>
                                <option value="viuvo">Viúvo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Column 3 -->
                <div>
                    <div class="row p-3 ps-0 pe-0 divInputText">
                        <div class="col-6">
                            <div class="cadastroInputsDiv">
                                <label>CEP:</label>
                                <input type="text" name="inputCep" id="inputCep"
                                    value="<?php echo isset($_POST["inputCep"]) ? $_POST["inputCep"] : '' ?>" required>
                                <span class="errorMessage">
                                    <?php echo $cepErr ?>
                                </span>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="cadastroInputsDiv">
                                <label>Cidade:</label>
                                <input type="text" name="inputCidade" id="inputCidade" placeholder="exemplo: Registro"
                                    value="<?php echo isset($_POST["inputCidade"]) ? $_POST["inputCidade"] : '' ?>"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row p-3 divInputText">
                        <div class="cadastroInputsDiv">
                            <label>Bairro:</label>
                            <input type="text" name="inputBairro" id="inputBairro" placeholder="exemplo: Vila Vitoria"
                                value="<?php echo isset($_POST["inputBairro"]) ? $_POST["inputBairro"] : '' ?>"
                                required>
                        </div>
                    </div>
                    <div class="row p-3 ps-0 divInputText">
                        <div class="col-6">
                            <div class="cadastroInputsDiv">
                                <label>Número:</label>
                                <input type="number" name="inputNum" id="inputNum" placeholder="exemplo: 343"
                                    value="<?php echo isset($_POST["inputNum"]) ? $_POST["inputNum"] : '' ?>"
                                    required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="cadastroInputsDiv">
                                <label>Rua:</label>
                                <input type="text" name="inputRua" id="inputRua" placeholder="exemplo: Rua Iguape"
                                    value="<?php echo isset($_POST["inputRua"]) ? $_POST["inputRua"] : '' ?>"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Botoes Div -->
                <div class="row p-3 divInputText">
                    <div class="col-4 text-center">
                        <input class="btn btn-success" type="submit" value="SALVAR">
                    </div>
                    <div class="col-4 text-center">
                        <span class="errorMessage">
                            <?php echo $genericError ?>
                        </span>
                    </div>
                    <div class="col-4 text-center">
                        <button class="btn btn-danger" id="btnResetar" onclick="resetarFormData()">CANCELAR</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    /* Resetar Formulário: */
    function resetarFormData() {
        var btnResetar = document.getElementById('btnResetar');
        var inputs = document.querySelectorAll('input');
        btnResetar.addEventListener('click', () => {
            inputs.forEach(input => input.value = '');
        });
    };

    /* Inserir idade a partir do inputDate onchange */
    $("#inputBirthDate").change(function () {
        var formdata = $('#formDados').serialize();
        $.ajax({
            type: 'POST',
            url: '../controllers/calcularIdade.php',
            data: formdata,
            success: function (data) {
                $("#inputIdade").val(data);

            }
        });
    });

    /* Inserir cidade a partir do inputCep onchange */
    $("#inputCep").change(function () {
        var formdata = $('#formDados').serialize();
        $.ajax({
            type: 'POST',
            url: '../controllers/getInfoCep.php',
            data: formdata,
            success: function (data) {
                $("#inputCidade").val(data);
            }
        });
    });


    $('document').ready(function () {
        $("#inputCpf").mask("000.000.000-00");
        $("#inputTel").mask("(00) 00000-0000");
        $("#inputCep").mask("00000-000");
    });

</script>
<?php include("blades/footer.php"); ?>