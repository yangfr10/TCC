<div class="modal" id="cadastrar">

<<<<<<< HEAD
    <form action="Calendar_action/cad_event.php" id="addevent" method="POST">
=======
    <form action="cad_event" id="addevent" method="POST">
>>>>>>> 56d492159c954cd5a442fb0a52d30c6126c4ccae
        <div class="modal-content">
            <h4>Detalhes do evento</h4>
            <hr />
            <br />

            <div class="input-field">
                <label for="title">Título</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="col s12 m6">
                <label for="color">Cor</label>
<<<<<<< HEAD
                <select name="color" id="color">
=======
                <select name="color" id="color" required>
>>>>>>> 56d492159c954cd5a442fb0a52d30c6126c4ccae
                    <option value="" disabled selected>Selecione</option>
                    <option style="color:#FF0000;" value="#FF0000">Vermelho</option>
                    <option style="color:#00FF00;" value="#00FF00">Verde</option>
                    <option style="color:#0000FF;" value="#0000FF">Azul</option>
                </select>
            </div>
            <div>
                <label for="start">Início</label>
                <input type="text" id="start" name="start" required>
            </div>
            <div>
                <label for="end">Fim</label>
                <input type="text" id="end" name="end" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn" id="btncadastrar">Cadastrar</button>
            <a class="btn modal-close modal-action">Sair</a>
        </div>

    </form>
</div>