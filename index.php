<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profiles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>User Profiles</h1>
        <?php
        require 'UserProfileFetcher.php';
        $fetcher  = new UserProfileFetcher();
        $profiles = $fetcher->fetchProfiles();

        if ($profiles && isset($profiles->users)) {
            echo '<ul>';
            foreach ($profiles->users as $user) {
        ?>
                <li>
                    <?=$user->name?>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$user->id?>">View Details</a>
                </li>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?=$user->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$user->name?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Email:</strong> <?=$user->email?></p>
                                <p><strong>Biography:</strong> <?=$user->biography?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
            echo '</ul>';
        } else {
            echo '<p>Failed to fetch profiles. Please try again later.</p>';
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
