</div>
</div>
</div>
<footer class="bg-gray-800 text-white flex justify-center items-center px-6 py-4">
    <p>&copy; 2034 Admin Dashboard. All Rights Reserved.</p>

</footer>

</div>

<script src="/js/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

<script>
    const profileButton = document.getElementById('profileButton');
    const profileDropdown = document.getElementById('profileDropdown");

        profileButton.addEventListener('click', () => {
        profileDropdown.classList.toggle('hidden');
    });
    window.addEventListener('click', (event) => {
        if (!profileDropdown.contains(event.target) && !profileButton.contains(event.target)
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
            reader.readAsDataUrl(file);
        }

    }
</script>

<script>


    function confirmDelete(userId) {
console.log("I GOT HERE")

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
                document.getElementById('delete-form'+ userId).submit();

                Swal.fire({                    
                    title: "Deleted!",
                    text: "This User has been deleted.",
                    icon: "success"
                });
            }
        });
    }

</script>


<script>

function confirmDeleteLoanType(loanTypeId) {
    Swal.fire({
            title: "Confirm Delete?",
            text: "Are you sure you want to delete this loan type?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm'+ loanTypeId).submit();

                Swal.fire({                    
                    title: "Deleted!",
                    text: "This User has been deleted.",
                    icon: "success"
                });
            }
        });
    }

</script>



</body>

</html>