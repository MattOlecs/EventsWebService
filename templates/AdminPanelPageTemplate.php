<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Users registered: <b><?= $usersRegistered ?></b></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Users registered today: <b><?= $usersRegisteredToday ?></b></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Users logged in: <b><?= $usersLogged ?></b></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Users logged in today: <b><?= $usersLoggedToday ?></b></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Events created: <b><?= $eventsCreated ?></b></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Events created today: <b><?= $eventsCreatedToday ?></b></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Events joined: <b><?= $eventsJoined ?></b></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Events joined today: <b><?= $eventsJoinedToday ?></b></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Average logged in time: <b><br><?= $avgLoggedTime ?></b></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Most owned events user: <br><b><?= $mostOwnedEvents ?></b></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Most active user: <br><b><?= $mostActiveUser ?></b></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Least active user : <b><br><?= $leastActiveUser ?></b></div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div>
                <div class="card-body" style="overflow-x:scroll;">
                    <table id="datatablesSimple" class="dataTable-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Login</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Notifications</th>
                                <th>Admin</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Login</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Notifications</th>
                                <th>Admin</th>
                                <th>Active</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            foreach ($users as $user) {
                            ?>
                                <tr data-href="/edit-profile/<?= $user['id'] ?>">
                                    <td><input type="hidden" name="id" /><?= $user['id'] ?></td>
                                    <td><?= $user['login'] ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['password'] ?></td>
                                    <td><?= $user['name'] ?></td>
                                    <td><?= $user['surname'] ?></td>
                                    <td><?= $user['allow_notifications'] ?></td>
                                    <td><?= $user['is_admin'] ?></td>
                                    <td><?= $user['is_active'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const rows = document.querySelectorAll("tr[data-href]");
            rows.forEach(row => {
                row.addEventListener("click", () => {
                    window.location.href = row.dataset.href;
                })
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</section>