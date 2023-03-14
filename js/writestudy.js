// const input2 = document.querySelector('input[name="addPicture"]');

// input2.style.opacity = 0;

// const divList = document.querySelector('.hashtag2');
// const addBtn = document.querySelector('.addbtn');
// //input.addEventListener('change', updateImageDisplay);
// const addInput = document.querySelector('input[name="field"]');

// addBtn.addEventListener('click', () => {
//   const ul = divList.querySelector('.list');
//   const li = document.createElement('li');
//   li.innerHTML = addInput.value;
//   ul.appendChild(li);
//   addInput.value = "";
//   //alert($().jquery);
// });

// input2.onchange = function () {
//   const image=this.value;
//   // var f = document.getElementById("input").files[0];

//   // var fileSize = f.size;
//   // var fileName = f.name;
//   // var fileType = f.type;

//   // console.log(fileName);

//   //image.replace('C:\\fakepath\\', 'C:\\Users\\LG\\Desktop\\')
//   alert('Selected file: ' + image);
//   //document.getElementById("noimage").style.backgroundImage = url(image);
//   //document.getElementById("noimage").style.backgroundImage = fileName;
// };



// function updateImageDisplay() {
//   while(preview.firstChild) {
//     preview.removeChild(preview.firstChild);
//   }

//   const curFiles = input2.files;

//   document.getElementById("noimage").style.backgroundImage = curFiles;
//   // if (curFiles.length === 0) {
//   //   const para = document.createElement('p');
//   //   para.textContent = 'No files currently selected for upload';
//   //   preview.appendChild(para);
//   // } else {
//   //   const list = document.createElement('ol');
//   //   preview.appendChild(list);

//   //   for (const file of curFiles) {
//   //     const listItem = document.createElement('li');
//   //     const para = document.createElement('p');
//   //     if (validFileType(file)) {
//   //       para.textContent = `File name ${file.name}, file size ${returnFileSize(file.size)}.`;
//   //       const image = document.createElement('img');
//   //       image.src = URL.createObjectURL(file);

//   //       listItem.appendChild(image);
//   //       listItem.appendChild(para);
//   //     } else {
//   //       para.textContent = `File name ${file.name}: Not a valid file type. Update your selection.`;
//   //       listItem.appendChild(para);
//   //     }

//   //     list.appendChild(listItem);
//   //   }
//   // }
// }