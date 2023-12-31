<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- External Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <!-- Main Container -->
    <div class="flex flex-col h-screen bg-gray-100">
        <!-- Header Section -->
        @include('admin.sections.header')

        <!-- Main Content Section -->
        <div class="flex-1">
            <div class="flex h-full">
                <!-- Sidebar Section -->
                @include('admin.sections.sidebar')

                <!-- Page content Section -->
                <div class="flex-1 p-10">
                    <!-- Page content goes here -->
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Footer Section -->
        @include('admin.sections.footer')
    </div>

    <!-- External Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js"></script>

    <!-- Custom Scripts -->
    <script>
        const profileButton = document.getElementById('profileButton');
        const profileDropdown = document.getElementById('profileDropdown');

        profileButton.addEventListener('click', () => {
            profileDropdown.classList.toggle('hidden');
        });

        window.addEventListener('click', (event) => {
            if (!profileDropdown.contains(event.target) && !profileButton.contains(event.target)) {
                profileDropdown.classList.add('hidden');
            }
        });
    </script>
    <script>
        function previewImage() {
            const fileInput = document.getElementById('profileImage');
            const imagePreview = document.getElementById('selectedImage');
            const profilePreview = document.getElementById('profilePreview');

            const file = fileInput.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = (e) => {
                    imagePreview.src = e.target.result;
                    profilePreview.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        }
    </script>
    <script>
        function showDeleteConfirmation(userId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form' + userId).submit();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        }
    </script>
    <script>
        function deleteLoanType(loanId) {
            Swal.fire({
                title: "Confirm Delete",
                text: "Are you sure you want to delete this loan type",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-loan' + loanId).submit();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your loan type has been deleted.",
                        icon: "success"
                    });
                }
            });
        }
    </script>
</body>

</html>