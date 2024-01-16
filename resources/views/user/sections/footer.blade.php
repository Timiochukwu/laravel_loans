</div>
</div>
</div>


<footer class="bg-gray-800 text-white flex justify-center items-center px-6 py-4">
    <p>&copy; 2024 Admin Dashboard. All Rights Reserved.</p>

</footer>
</div>


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

</body>

</html>