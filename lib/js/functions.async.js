export async function postMultipleFiles(url, files, inputName) {
  try {
    const formData  = new FormData();

    for (const file of files) {
      formData.append(inputName, file);
    }

    let response = await fetch(url, {
      method: 'POST',
      body: formData
    });

    response = await response.json(); 
    return response;

  } catch(error) {
    console.log(error);
  }
}

export async function getData(url) {
  try {
    let response = await fetch(url);
    response = await response.json();
    return response;

  } catch(error) {
    console.log(error);
  }
}

export async function alterData(url, data) {
  try {
    const formData = new FormData();

    for (const key in data) {
      formData.append(key, data[key]);
    }

    let response = await fetch(url, {
      method: 'POST',
      body: formData
    });

    response = await response.json();
    return response;

  } catch(error) {
    console.log(error);
  }
}