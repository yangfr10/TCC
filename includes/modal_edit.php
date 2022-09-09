<div class="modal open" id="modal2">
<div class="formedit" style="padding-bottom: 20px; padding-left: 20px;">
    <form action="edit_event" id="editevent" method="POST">
        <div class="modal-content" style="padding: 0px;">
            <input type="hidden" name="id" id="id">
            <div>
                <label for="title">Título</label>
                <input type="text" id="title" name="title">
            </div>

            <div class="col s12 m6">
                <label for="color">Cor</label>
                <select name="color" id="color">
                    <option value="">Selecione</option>
                    <option style="color:#FF0000;" value="#FF0000">Vermelho</option>
                    <option style="color:#00FF00;" value="#00FF00">Verde</option>
                    <option style="color:#0000FF;" value="#0000FF">Azul</option>
                </select>
            </div>
            <div>
                <label for="start">Início</label>
                <input type="text" id="start" name="start">
            </div>
            <div>
                <label for="end">Fim</label>
                <input type="text" id="end" name="end">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn waves effect-waves light blue btn-cancelar">Cancelar</button>
            <button type="submit" class="btn" id="btneditar">Confirmar</button>
        </div>

    </form>
</div>
</div>