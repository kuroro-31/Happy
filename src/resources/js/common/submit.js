// 送信ボタンのdisabled
function on_submit() {
    document.getElementById("submit-btn").disabled = true;
}
document.getElementById("submit-form").addEventListener("submit", on_submit);
