function searchitem() {
    var input, filter, table, tr, tdName, tdCNPJ, i, txtValueName, txtValueCNPJ;
    input = document.getElementById("idSearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("listItem");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        tdName = tr[i].getElementsByTagName("td")[0]; // Nome do fornecedor
        tdCNPJ = tr[i].getElementsByTagName("td")[1]; // CNPJ
        if (tdName || tdCNPJ) {
            txtValueName = tdName.textContent || tdName.innerText;
            txtValueCNPJ = tdCNPJ.textContent || tdCNPJ.innerText;

            // Verifica se o valor do filtro está presente em qualquer um dos campos
            if (txtValueName.toUpperCase().indexOf(filter) > -1 ||
                txtValueCNPJ.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = ""; // Exibe a linha
            } else {
                tr[i].style.display = "none"; // Oculta a linha
            }
        }
    }
}
