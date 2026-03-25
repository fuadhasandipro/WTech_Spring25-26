console.log("Connected");

function analyze_data() {
  let text = document.getElementById("InputText").value;

  let wordsArray = text.split(" ");
  let wCount = 0;

  for (let i = 0; i < wordsArray.length; i++) {
    if (wordsArray[i].trim() !== "") {
      wCount++;
    }
  }

  let cCount = text.length;
  let rText = text.split("").reverse().join("");

  document.getElementById("charCount").innerHTML = cCount;
  document.getElementById("wordCount").innerHTML = wCount;
  document.getElementById("reversedText").innerHTML = rText;

  return false;
}
