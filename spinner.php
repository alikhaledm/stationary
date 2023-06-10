<style>
    .spinner {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-color: #f3f3f3;
        box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.1);
        animation: spin 1s linear infinite;
        z-index: 9999;
    }

    .spinner::before,
    .spinner::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 20px;
        height: 20px;
        border-radius: 50%;
    }

    .spinner::before {
        background-color: gold;
        /* Updated color to gold */
        animation: bounce 1s infinite ease-in-out;
    }

    .spinner::after {
        background-image: url('images/logo/1d.png');
        /* Replace 'pencil.png' with your pencil icon */
        background-size: 100%;
        background-repeat: no-repeat;
        animation: bounce 1s infinite ease-in-out alternate;
    }

    @keyframes spin {
        0% {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        100% {
            transform: translate(-50%, -50%) rotate(360deg);
        }
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translate(-50%, -50%) scale(0.8);
        }

        50% {
            transform: translate(-50%, -50%) scale(1.2);
        }
    }
</style>


<div class="spinner"></div>

<script>
    window.addEventListener('load', function () {
        var spinner = document.querySelector('.spinner');
        spinner.style.display = 'none';
    });
</script>