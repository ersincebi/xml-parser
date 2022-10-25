function searchOnKeyUp() {
	let input = document.getElementById("search-bar");
	let filter = input.value.toUpperCase();
	let dataRows = document.querySelector("tbody");
	let tableRows = dataRows.getElementsByTagName("tr");

	for (let i = 0; i < tableRows.length; i++) {
		let td = tableRows[i];
		if (td) {
			let txtValue = td.textContent || td.innerText;
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				tableRows[i].style.display = ""
				tableRows[i].classList.remove('row-animate');
			} else {
				tableRows[i].classList.add('row-animate');
				setTimeout(function () {
					let rows = document.getElementsByClassName('row-animate');
					for (let j = 0; j < rows.length; j++) {
						rows[j].style.display = "none";
					}
				},500);
			}
		}
	}
}