<div class="modal" id="cadastrar">

    <form action="cad_event" id="addevent" method="POST">
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
                <select name="color" id="color" required>
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