<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const adminRedirect = async () => {
        const {
            value: password
        } = await Swal.fire({
            title: "Enter your password",
            input: "password",
            inputLabel: "Password",
            inputPlaceholder: "Enter your password",
            inputAttributes: {
                maxlength: "10",
                autocapitalize: "off",
                autocorrect: "off"
            }
        });

        if (password === "Admin@2025") {
            location.href = "./Admin/pages/sign-in.php";
        }
    };
</script>