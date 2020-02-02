window.onload = function(){
  console.log("sad")
  if($_GET()["exists"] === "true")
  {
    Swal.fire({
      type: 'error',
      title: 'Oops',
      confirmButtonColor: "maroon",
      html: 'Looks like a title by that composer\nalready exists in our database...'
    })
  }
}

var currIndex = 1;
function addInstrument()
{
  var newDiv = document.createElement("div");
  newDiv.innerHTML = document.getElementById("base").innerHTML;
  newDiv.classList.add("index"+currIndex);
  newDiv.getElementsByTagName("button")[0].classList.add("index"+currIndex);
  newDiv.getElementsByClassName("instrument")[0].required = true;
  newDiv.getElementsByClassName("quantity")[0].required = true;
  newDiv.getElementsByClassName("note")[0].required = true;
  document.getElementById("instrumentation").appendChild(newDiv);
  document.body.style.height = "calc(100% + 30px)";
  window.scrollTo(0,document.body.scrollHeight);
  currIndex++;
}

function removeInstrument(clicked_classes)
{
  var clicked_element = document.getElementsByClassName(clicked_classes[2])[0];
  clicked_element.parentNode.removeChild(clicked_element);
}

function checkboxEnable(clicked_id)
{
  if(document.getElementById(clicked_id).checked == true)
  {
    document.getElementById(clicked_id.substring(0, clicked_id.indexOf("-"))).disabled = false;
  }
  else
  {
    document.getElementById(clicked_id.substring(0, clicked_id.indexOf("-"))).disabled = true;
 }
}

function nmrDisplay()
{
  var selected = document.getElementById("type").options[document.getElementById("type").selectedIndex].value;
  if(selected === "Solo")
  {
    document.getElementById("nmr").style.display = "block";
  }
  else
  {
    document.getElementById("nmr").style.display = "none";
  }
}

function checkFields()
{
    var links = new Array(4);

    var wiki = document.getElementById("wiki");
    var imslp = document.getElementById('imslp');
    var youtube = document.getElementById('youtube');

    links[1] = document.getElementById('wiki-check').checked ? wiki : undefined;
    links[2] = document.getElementById('imslp-check').checked ? imslp : undefined;
    links[3] = document.getElementById('youtube-check').checked ? youtube : undefined;

    for(var i = 1; i < links.length; i++)
    {
      if(!links[i] === undefined && !validURL(links[i]))
      {
        alert("Please enter valid links where required!");
        return false;
      }
    }

    return true;
}

//Obtained from Devshed
function validURL(str) {
  var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
    '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
  return !!pattern.test(str);
}

function $_GET() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

function showInfo()
{
  var html = "<table>"+
    "<tr>"+
      "<td align='right' width='33%'><strong>Title: </strong></td>"+
      "<td>&nbsp;The full name of the piece, <strong>'Symphony No. 2 Op. 27'</strong></td>"+
    "</tr>"+
    "<tr>"+
      "<td align='right'><strong>Composer: </strong></td>"+
      "<td>&nbsp;The full name composer of the piece, <strong>'Sergei &nbsp;Rachmaninoff'</strong></td>"+
    "</tr>"+
    "<tr>"+
      "<td align='right'><strong>Arranger: </strong></td>"+
      "<td>&nbsp;The arranger of the piece, if one exists, <strong>'[Blank]'</strong></td>"+
    "</tr>"+
    "<tr>"+
      "<td align='right'><strong>Publisher </strong></td>"+
      "<td>&nbsp;The full name of the publisher of the piece, <strong>'A. Gutheil, n.d.'</strong></td>"+
    "</tr>"+
    "<tr>"+
      "<td align='right'><strong>Ensemble Type: </strong></td>"+
      "<td>&nbsp;Select ensemble type from dropdown, <strong>'Classical'</strong></td>"+
    "</tr>"+
    "<tr>"+
      "<td align='right'><strong>Grade Level: </strong></td>"+
      "<td>&nbsp;Select grade level from dropdown, <strong>'5'</strong> </td>"+
    "</tr>"+
    "<tr>"+
      "<td align='right'><strong>UIL PML Code: </strong></td>"+
      "<td>&nbsp;The UIL PML code, if one exists, <strong>'[Blank]'</strong></td>"+
    "</tr>"+
    "<tr>"+
      "<td align='right'><strong>Links: </strong></td>"+
      "<td>&nbsp;Links to appropriate webpages, if they exist</td>"+
    "</tr>"+
    "<tr>"+
      "<td align='right'><strong>Comments: </strong></td>"+
      "<td>&nbsp;Notes to add (include prior performances), if they exist</td>"+
    "</tr>"+
    "<tr>"+
      "<td align='right'><strong>Instrumentation: </strong></td>"+
      "<td>&nbsp;Select instrument, quantity, and note.</td>"+
    "</tr>"+
    "<tr>"+
      "<td align='right'><strong>Note: </strong></td>"+
      "<td>&nbsp;Information about the selected instrument, such as solos</td>"+
    "</tr>"+
  "</table>";

    Swal.fire({
      type: 'info',
      confirmButtonColor: "maroon",
      width: 800,
      title: 'Information',
      html: html,
      footer: "The system can only check for semantical errors, so please double check for typos!"
    })
}
