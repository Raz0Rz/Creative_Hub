document.addEventListener('DOMContentLoaded', function() {
    deistv();
    showphoto();
    adprice();
    visob();
    handleRegistration();
    handleLogic();
});

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

function showFormErrors(errors, formSelector, errorClassName) {
    const form = document.querySelector(formSelector);
    if (!form) return;

    // Удаляем старые ошибки
    const existingError = form.querySelector(`.${errorClassName}`);
    if (existingError) existingError.remove();

    // Создаём блок ошибок
    const errorDiv = document.createElement('div');
    errorDiv.className = errorClassName;
    errorDiv.style.cssText = `
        background-color: #ffebee;
        color: #c62828;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px;
        font-size: 14px;
        border-left: 4px solid #c62828;
    `;

    if (Array.isArray(errors)) {
        errorDiv.innerHTML = '<ul style="margin: 0; padding-left: 20px;">' + 
            errors.map(err => `<li>${escapeHtml(err)}</li>`).join('') + 
            '</ul>';
    } else {
        errorDiv.textContent = errors;
    }

    // Вставляем в начало формы
    form.insertBefore(errorDiv, form.firstChild);

    // Авто-скрытие через 5 секунд
    setTimeout(() => {
        if (errorDiv.parentNode) errorDiv.remove();
    }, 5000);
}

function handleRegistration() {
    const regForm = document.querySelector('.registration form');
    const regWindow = document.querySelector('.registration');
    const overlay = document.querySelector('.overlay');

    if (!regForm) return;
    
    regForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(regForm);
        
        // Блокируем кнопку на время отправки
        const submitBtn = regForm.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Регистрация...';
        submitBtn.disabled = true;
        
        // Удаляем старые ошибки
        const oldError = document.querySelector('.reg-error-message');
        if (oldError) oldError.remove();
        
        try {
            const response = await fetch(SITE_URL + 'handlers/sign_in.php', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            
            if (result.success) {
                // Успех - закрываем окно и редирект
                regWindow.classList.remove('visible');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
                window.location.href = result.redirect;
            } else {
                // Показываем ошибки
                showFormErrors(result.errors, '.registration form', 'reg-error-message');
            }
        } catch (error) {
            console.error('Ошибка:', error);
            showFormErrors(['Произошла ошибка при отправке'], '.registration form', 'reg-error-message');
        } finally {
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }
    });
}

function handleLogic(){
    const overlay = document.querySelector('.overlay');
    const entForm = document.querySelector('.enter form');
    const entWindow = document.querySelector('.enter');

    if(!entForm) return;

    entForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(entForm);

        const submitBtn = document.querySelector('.vxbut');
        submitBtn.disabled = true;
        const originalText = submitBtn.textContent;
        submitBtn.textContent = "Вход...";

        const oldError = document.querySelector('.login-error-message');
        if (oldError) oldError.remove();

        try {
            const response = await fetch(SITE_URL + 'handlers/login.php', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            
            if (result.success) {
                // Успех - закрываем окно и редирект
                entWindow.classList.remove('visible');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
                window.location.href = result.redirect;
            } else {
                // Показываем ошибки
                showFormErrors(result.errors, '.enter form', 'login-error-message');
            }
        } catch (error) {
            console.error('Ошибка:', error);
            showFormErrors(['Введены неверные данные'], '.enter form', 'login-error-message');
        } finally {
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }
    });
}

// Простая защита от XSS
function escapeHtml(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }