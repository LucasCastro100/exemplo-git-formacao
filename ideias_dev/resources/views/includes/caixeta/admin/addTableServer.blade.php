<form action="{{ route('dashBoard.store') }}" method="post" enctype="multipart/form-data" class="row p-0 col-12 uploadFiles">
    @csrf

    <div class="form-group col-lg-5 col-12">
        <label for="fileTable">Selecione a Tabela</label>
        <input type="file" name="fileTable" id="fileTable" class="form-item" accept=".xls,.xlsx">
    </div>

    <div class="form-group col-lg-5 col-12">
        <label for="baseTable">Base Tabela</label>
        <select name="baseTable" id="baseTable" class="form-item">
            <option disabled selected>Selecione...</option>
            <option value="cap">Caixeta Auto Peças</option>
            <option value="bap">Brumado Auto Peças</option>
            <option value="pca">PCA Parabrisas</option>
        </select>
    </div>

    <div class="form-group col-lg-2 col-12 d-flex justify-center align-end">
        <input type="submit" value="Enviar" class="btn click">
    </div>
</form>

