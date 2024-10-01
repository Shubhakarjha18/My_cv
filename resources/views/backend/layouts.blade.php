<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanatani_coder | @yield('title')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-K56IKI3MsIp/XwAFR0LaZlAfoh7f1EpaJq5l5E6e9Xk+OFjPevymqVRSOj94mligbBV8pO3ywV5g3ENQpD+lhUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <style>
        /* Add your custom styles here */
        body {
            padding-top: 60px; /* Adjust based on your navbar height */
        }
        @keyframes textAnimation {
    0% { opacity: 0; transform: translateY(20px); }
    50% { opacity: 0.5; transform: translateY(0); }
    100% { opacity: 1; transform: translateY(-20px); }
}

.animate-text {
    animation: textAnimation 2s ease-in-out infinite;
}
    </style>
</head>
<body class="bg-gray-100">
    
    <!-- Navbar -->
    <nav class="bg-yellow-800 w-full z-10">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a class="text-white text-lg font-bold" href="#">Admin Panel</a>
                <button class="text-white md:hidden" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
                <div class="hidden md:flex space-x-4">
                    <a class="text-white hover:bg-gray-700 px-3 py-2 rounded" href="{{ route('homepage')}}"><i class="fas fa-user"></i> Website</a>
                    <a class="text-white hover:bg-gray-700 px-3 py-2 rounded" href="{{ route('admin.login')}}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div>
            <div class="collapse md:flex md:items-center" id="navbarNav">
                <div class="flex flex-col md:flex-row md:space-x-4">
                    <!-- Optional additional links can go here -->
                </div>
            </div>
        </div>
    </nav>
    

    <!-- Sidebar -->
    <div class="flex">
        <nav class="bg-yellow-900 w-64 min-h-screen shadow-md">
            <div class="p-4 text-white">
                <ul class="space-y-2">
                    <li>
                        <a class="flex items-center text-gray-300 p-2 rounded-lg hover:bg-gray-800" href="{{route('dashboard')}}">
                            <i class="fas fa-home"></i>
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-300 p-2 rounded-lg hover:bg-gray-800" href="#" onclick="toggleDropdown('aboutDropdown')">
                            <i class="fas fa-map-marker-alt"></i>
                            <span class="ml-2">About Section</span>
                        </a>
                        <ul id="aboutDropdown" class="ml-4 space-y-1 hidden">
                            <li><a class="flex items-center text-gray-300 p-2 hover:bg-gray-800" href="{{ route('admin.about')}}"><i class="fas fa-chart-bar"></i> Add section</a></li>
                            <li><a class="flex items-center text-gray-300 p-2 hover:bg-gray-800" href="{{ route('admin.view_about')}}">View All</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-300 p-2 rounded-lg hover:bg-gray-800" href="#" onclick="toggleDropdown('educationDropdown')">
                            <i class="fas fa-map-marker-alt"></i>
                            <span class="ml-2">Education Section</span>
                        </a>
                        <ul id="educationDropdown" class="ml-4 space-y-1 hidden">
                            <li><a class="flex items-center text-gray-300 p-2 hover:bg-gray-800" href="{{ route('admin.education')}}"><i class="fas fa-chart-bar"></i> Add section</a></li>
                            <li><a class="flex items-center text-gray-300 p-2 hover:bg-gray-800" href="{{ route('admin.view_education')}}">View All</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-300 p-2 rounded-lg hover:bg-gray-800" href="#" onclick="toggleDropdown('contactDropdown')">
                            <i class="fas fa-map-marker-alt"></i>
                            <span class="ml-2">Contact Section</span>
                        </a>
                        <ul id="contactDropdown" class="ml-4 space-y-1 hidden">
                            <li><a class="flex items-center text-gray-300 p-2 hover:bg-gray-800" href="{{ route('admin.contacts')}}"><i class="fas fa-chart-bar"></i> Add section</a></li>
                            <li><a class="flex items-center text-gray-300 p-2 hover:bg-gray-800" href="{{ route('admin.view_contact')}}">View All</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-300 p-2 rounded-lg hover:bg-gray-800" href="#" onclick="toggleDropdown('projectsDropdown')">
                            <i class="fas fa-map-marker-alt"></i>
                            <span class="ml-2">Projects Section</span>
                        </a>
                        <ul id="projectsDropdown" class="ml-4 space-y-1 hidden">
                            <li><a class="flex items-center text-gray-300 p-2 hover:bg-gray-800" href="{{ route('admin.projects')}}"><i class="fas fa-chart-bar"></i> Add section</a></li>
                            <li><a class="flex items-center text-gray-300 p-2 hover:bg-gray-800" href="{{ route('admin.view-projects')}}">View All</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-300 p-2 rounded-lg hover:bg-gray-800" href="#" onclick="toggleDropdown('skillsDropdown')">
                            <i class="fas fa-map-marker-alt"></i>
                            <span class="ml-2">Skills Section</span>
                        </a>
                        <ul id="skillsDropdown" class="ml-4 space-y-1 hidden">
                            <li><a class="flex items-center text-gray-300 p-2 hover:bg-gray-800" href="{{ route('admin.skills.create')}}"><i class="fas fa-chart-bar"></i> Add section</a></li>
                            <li><a class="flex items-center text-gray-300 p-2 hover:bg-gray-800" href="{{ route('admin.skills.index')}}">View All</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-300 p-2 rounded-lg hover:bg-gray-800" href="{{ route('admin.view_admin') }}">
                            <i class="fas fa-table"></i>
                            <span class="ml-2">Admins</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-300 p-2 rounded-lg hover:bg-gray-800" href="{{ route('admin.generator')}}">
                            <i class="fas fa-table"></i>
                            <span class="ml-2">Text Generator</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-300 p-2 rounded-lg hover:bg-gray-800" href="#">
                            <i class="fas fa-table"></i>
                            <span class="ml-2">All Admins</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-300 p-2 rounded-lg hover:bg-gray-800" href="#">
                            <i class="fas fa-table"></i>
                            <span class="ml-2">Online Users</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-300 p-2 rounded-lg hover:bg-gray-800" href="#">
                            <i class="fas fa-table"></i>
                            <span class="ml-2">Website Hits</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
  
    
    <script>
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            dropdown.classList.toggle('hidden');
        }
    </script>
    

        <!-- Content -->
        <div class="flex-1 p-6">
            <!-- Admin Card -->
            @yield('content')
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

 
     <!-- Font Awesome Icons JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-+DStmd45Pzf0qEuOB+p7MIq+oZp2/V+fnMyRIdaRR2WZsAXUBX1IihTjk+I4vJ+t6MI9PAwRLkF2Ys/GaDwnCQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script>
        // Manually initialize the Bootstrap dropdown
        $(document).ready(function () {
            $('.nav-item .nav-link').click(function () {
                $(this).next('.dropdown-menu').toggle();
            });

            // Hide dropdown when clicking outside
            $(document).click(function (e) {
                if (!$(e.target).closest('.nav-item').length) {
                    $('.dropdown-menu').hide();
                }
            });
        });
    </script>
    
       
        
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            //Admin Actions
            // Delete admin action
            $('.delete-admin-btn').on('click', function() {
                const adminId = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Make the delete request
                        $.ajax({
                            url: `/admin/delete/${adminId}`, // Delete admin
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function(response) {
                                if (response.success) {
                                    // $(`#admin-${adminId}`).remove(); // Remove the admin card from the UI
                                    Swal.fire('Deleted!', 'The admin has been deleted.', 'success');
                                } else {
                                    Swal.fire('Error!', response.message, 'error');
                                }
                            },
                            error: function(xhr) {
                                Swal.fire('Error!', xhr.responseJSON.message, 'error');
                            }
                        });
                    }
                });
            });
    
            // Enable admin action
            $('.enable-admin-btn').on('click', function() {
                const adminId = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to enable this admin?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, enable it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Make the enable request
                        $.ajax({
                        url: `/admin/enable/${adminId}`, // Enable admin
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire('Enabled!', 'The admin has been enabled.', 'success');
                                location.reload(); // Reload the page to show the updated status
                            } else {
                                Swal.fire('Error!', response.message, 'error');
                            }
                        },
                        error: function(xhr) {
                            Swal.fire('Error!', xhr.responseJSON.message, 'error');
                        }
                    });
                    }
                });
            });
        });

        //About Actions
        @if (session('success'))
        swal({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success",
            button: "OK",
        });
    @endif

    @if ($errors->any())
        swal({
            title: "Error!",
            text: "{!! implode('\n', $errors->all()) !!}",
            icon: "error",
            button: "OK",
        });
    @endif

    //education
    document.getElementById('educationForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission
            const form = this; // Reference to the form

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to submit the form?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, submit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if confirmed
                }
            });
        });

        //contact

        document.getElementById('contactForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission
            const form = this; // Reference to the form

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to submit the contact details?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, submit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if confirmed
                }
            });
        });
        //projects
        document.getElementById('projectForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission
            const form = this; // Reference to the form

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to submit the project details?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, submit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if confirmed
                }
            });
        });

        //skills

        document.getElementById('skillsForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission
            const form = this; // Reference to the form

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to submit the skill details?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, submit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if confirmed
                }
            });
        });

        //animated texts
        $(document).ready(function() {
        $('#textForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            var animateText = $('#animateText').val();
            var _token = $("input[name='_token']").val(); // Token for CSRF

            // Ajax request
            $.ajax({
                url: "{{ route('admin.post.generator') }}",  // URL to send the POST request
                method: 'POST',
                data: {
                    _token: _token,
                    text: text  // The data to send to the server
                },
                success: function(response) {
                    // SweetAlert for success
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Text has been successfully added!',
                        confirmButtonText: 'OK',
                        timer: 2000,
                    });

                    // Optionally, you can reset the form or perform other actions
                    $('#textForm')[0].reset();
                },
                error: function(response) {
                    var errors = response.responseJSON.errors;

                    // SweetAlert for error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: '<ul>' + $.map(errors, function(error) {
                            return '<li>' + error + '</li>';
                        }).join('') + '</ul>',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });

    //dashboard
    $(document).ready(function() {
    $('#textForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        var animateText = $('#animateText').val(); // Capture the text input
        var _token = $("input[name='_token']").val(); // CSRF token

        // Ajax request
        $.ajax({
            url: "{{ route('admin.post.generator') }}",  // URL to send the POST request
            method: 'POST',
            data: {
                _token: _token,
                text: animateText  // Send as 'text', as expected by the controller
            },
            success: function(response) {
                // SweetAlert for success
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Text has been successfully added!',
                    confirmButtonText: 'OK',
                    timer: 2000,
                });

                // Append the new animated text to the container
                $('#animatedTextsContainer').append(`
                    <div class="animate-text bg-gray-200 p-4 rounded-md">${animateText}</div>
                `);

                // Optionally, you can reset the form
                $('#textForm')[0].reset();
            },
            error: function(response) {
                var errors = response.responseJSON.errors;

                // SweetAlert for error
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: '<ul>' + $.map(errors, function(error) {
                        return '<li>' + error + '</li>';
                    }).join('') + '</ul>',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});

    </script>
    </body>
</html>
