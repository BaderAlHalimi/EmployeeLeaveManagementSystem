import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();
const notifiCount = document.getElementById("notifiCount");
const notifications = document.getElementById("notifications");
Echo.private('manager.' + userId)
    .listen('.user-leave-request', function (event) {
        var content = event.user + " Added a new " + event.name + " leave request";
        notifiCount.innerHTML = parseInt(notifiCount.innerHTML) + 1;
        notifications.innerHTML = `<div class="col-md-12 notif">
                                                <a href="${event.link}">
                                                    <p class='text-dark mb-0 pb-0'>
                                                        ${content}
                                                    </p>
                                                    <span class="text-muted">now</span>
                                                </a>
                                            </div>` + notifications.innerHTML;
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-start',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'info',
            title: content,
        })
    });

Echo.private('user.' + userId)
    .listen('.accept-user-leave-request', function (event) {
        var content = event.user + " Accepted your leave request";
        notifiCount.innerHTML = parseInt(notifiCount.innerHTML) + 1;
        notifications.innerHTML = `<div class="col-md-12 notif">
                                                <a href="${event.link}">
                                                    <p class='text-dark mb-0 pb-0'>
                                                        ${content}
                                                    </p>
                                                    <span class="text-muted">now</span>
                                                </a>
                                            </div>` + notifications.innerHTML;
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-start',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: content,
        })
    });
Echo.private('user-cancelled-request.' + userId)
    .listen('.cancel-user-leave-request', function (event) {
        var content = event.user + " Cancelled your leave request";
        notifiCount.innerHTML = parseInt(notifiCount.innerHTML) + 1;
        notifications.innerHTML = `<div class="col-md-12 notif">
                                                <a href="${event.link}">
                                                    <p class='text-dark mb-0 pb-0'>
                                                        ${content}
                                                    </p>
                                                    <span class="text-muted">now</span>
                                                </a>
                                            </div>` + notifications.innerHTML;
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-start',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: content,
        })
    });