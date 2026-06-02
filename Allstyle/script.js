document.addEventListener('DOMContentLoaded', deistv);
document.addEventListener('DOMContentLoaded', showphoto);
document.addEventListener('DOMContentLoaded', adprice);
document.addEventListener('DOMContentLoaded', visob);

function visob(){
    const buttObiavl = document.querySelector('.butt-obiavl');
    const obiavl = document.querySelector('.AddWindow');
    const overlay = document.querySelector('.overlay');
    const closeBtns = document.querySelectorAll('.close-btn');
    if (buttObiavl && obiavl) {
        buttObiavl.addEventListener('click', function(e){
            e.preventDefault();
            openWindow(obiavl);
        });
    }
    else{
        return;
    }

    closeBtns.forEach(but => {
        but.addEventListener('click', closeWindows);
    })
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeWindows();
        }
    });
    function openWindow(window){
        overlay.classList.add('active');
        window.classList.add('visible');
        document.body.style.overflow = 'hidden'
    }
    function closeWindows(){
        overlay.classList.remove('active');
        obiavl.classList.remove('visible');
        document.body.style.overflow = '';
    }
}

function deistv(){
    const regBtn = document.querySelector('.reg-btn');
    const regWindow = document.querySelector('.registration');
    const enterWindow = document.querySelector('.enter');
    const overlay = document.querySelector('.overlay');
    const closeBtns = document.querySelectorAll('.close-btn');
    if (!regWindow || !enterWindow) {
        return;
    }

    regBtn.addEventListener('click', function(e){
        e.preventDefault();
        openWindow(regWindow);
    })
    closeBtns.forEach(but => {
        but.addEventListener('click', closeWindows);
    })
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeWindows();
        }
    });

    const toEnterLink = regWindow.querySelector('a');
    const toRegLink = enterWindow.querySelector('a');

    toEnterLink.addEventListener('click', function(e){
        e.preventDefault();
        closeWindows();
        setTimeout(() => openWindow(enterWindow), 300);
    })
    toRegLink.addEventListener('click', function(e){
        e.preventDefault();
        closeWindows();
        setTimeout(() => openWindow(regWindow), 300);
    })

    function openWindow(window){
        overlay.classList.add('active');
        window.classList.add('visible');
        document.body.style.overflow = 'hidden'
    }
    function closeWindows(){
        overlay.classList.remove('active');
        regWindow.classList.remove('visible');
        enterWindow.classList.remove('visible');
        document.body.style.overflow = '';
    }
}

function showphoto(){
    const fileInput = document.getElementById('photos');
    const fileInfo = document.querySelector('.file-info');
    const fileList = document.querySelector('.file-list');

    if (!fileInput || !fileInfo || !fileList) {
        return;
    }
    fileInput.addEventListener('change', function() {
        if (this.files.length > 0) {
            fileInfo.textContent = `Выбрано файлов: ${this.files.length}`;
            
            // Очищаем список
            fileList.innerHTML = '';
            
            // Добавляем имена файлов
            Array.from(this.files).forEach((file, index) => {
                if (index < 3) { // Показываем только первые 3 файла
                    const fileItem = document.createElement('div');
                    fileItem.textContent = `• ${file.name}`;
                    fileList.appendChild(fileItem);
                }
            });
            
            if (this.files.length > 3) {
                const moreFiles = document.createElement('div');
                moreFiles.textContent = `... и еще ${this.files.length - 3} файлов`;
                fileList.appendChild(moreFiles);
            }
        } else {
            fileInfo.textContent = 'Файл не выбран';
            fileList.innerHTML = '';
        }
    });
}

function adprice(){
    const price = document.querySelector('.priceinf');
    const vxod = document.getElementById('pricevx');
    const priceInput = document.getElementById('price');

    if (!price || !vxod || !priceInput) {
        return;
    }

    vxod.addEventListener('change', function(){
        if(this.value === "Pay"){
            price.style.display = 'block';
            priceInput.required = true;
        }
        else{
            price.style.display = 'none';
            priceInput.required = false;
            priceInput.value = '';
        }
    })
}