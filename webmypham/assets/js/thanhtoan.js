// 1. what is API
// 2. How do I call API
// 3. Explain code
const host = "https://provinces.open-api.vn/api/";
var callAPI = (api) => {
    return axios.get(api)
        .then((response) => {
            renderData(response.data, "kh_tinh");
        });
}
callAPI('https://provinces.open-api.vn/api/?depth=1');
var callApiDistrict = (api) => {
    return axios.get(api)
        .then((response) => {
            renderData(response.data.districts, "kh_huyen");
        });
}
var callApiWard = (api) => {
    return axios.get(api)
        .then((response) => {
            renderData(response.data.wards, "kh_xa");
        });
}

var renderData = (array, select) => {
    let row = ' <option disable value="">chọn</option>';
    array.forEach(element => {
        row += `<option value="${element.code}">${element.name}</option>`
    });
    document.querySelector("#" + select).innerHTML = row
}

$("#kh_tinh").change(() => {
    callApiDistrict(host + "p/" + $("#kh_tinh").val() + "?depth=2");
    printResult();
});
$("#kh_huyen").change(() => {
    callApiWard(host + "d/" + $("#kh_huyen").val() + "?depth=2");
    printResult();
});
$("#kh_xa").change(() => {
    printResult();
})

var printResult = () => {
    if ($("#kh_huyen").val() != "" && $("#kh_tinh").val() != "" &&
        $("#kh_xa").val() != "") {
        let result = $("#kh_tinh option:selected").text() +
            " | " + $("#kh_huyen option:selected").text() + " | " +
            $("#kh_xa option:selected").text();
        $("#result").text(result)
    }

}