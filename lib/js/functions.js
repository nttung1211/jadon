export function displayUploadedImages(files, container, className) {
  container.innerHTML = '';
  
  for (const file of files) {

    if (!file.type.startsWith('image/')) { 
      continue;
    }

    const reader = new FileReader();

    reader.onload = (e) => { 
      container.innerHTML += `<img src=${e.target.result} class=${className} alt='image'>`; 
    }; 

    reader.readAsDataURL(file);
  }
}