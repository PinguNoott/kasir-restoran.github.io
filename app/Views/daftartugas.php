<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .priority-info {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .priority-info span {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            color: white;
        }

        .priority-high { background-color: #ffadad; } /* Merah pastel */
        .priority-medium { background-color: #ffd6a5; } /* Kuning pastel */
        .priority-low { background-color: #caffbf; } /* Hijau pastel */

        .todo-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
        }

        .todo-item {
            width: 220px;
            min-height: 150px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .priority-high { background-color: #ffadad; }
        .priority-medium { background-color: #ffd6a5; }
        .priority-low { background-color: #caffbf; }

        .todo-item.completed {
            text-decoration: line-through;
            opacity: 0.5;
        }

        .task-checkbox {
            position: absolute;
            top: 10px;
            right: 10px;
            transform: scale(1.2);
        }

    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">📌 To-Do List</h2>

        <!-- Keterangan Prioritas -->
        <div class="priority-info">
            <span class="priority-high">Prioritas Tinggi</span>
            <span class="priority-medium">Prioritas Sedang</span>
            <span class="priority-low">Prioritas Rendah</span>
        </div>

        <div class="todo-container">
            <?php foreach ($tugas as $task) : ?>
                <div class="todo-item 
                    <?= ($task->prioritas == 'Tinggi') ? 'priority-high' : (($task->prioritas == 'Sedang') ? 'priority-medium' : 'priority-low') ?> 
                    <?= ($task->status == 'Selesai') ? 'completed' : '' ?>">

                    <!-- Form untuk update status -->
                    <form method="POST" action="<?= base_url('home/updatestatus') ?>">
                        <input type="hidden" name="id_tugas" value="<?= $task->id_tugas ?>">
                        <input type="hidden" name="status" value="<?= ($task->status == 'Selesai') ? 'Belum Selesai' : 'Selesai' ?>">
                        
                        <input type="checkbox" class="task-checkbox" 
                               onchange="this.form.submit()" 
                               <?= ($task->status == 'Selesai') ? 'checked' : '' ?>>
                    </form>

                    <label class="form-check-label"><?= $task->nama_tugas ?></label>
                    <label class><?= $task->tanggal ?></label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
