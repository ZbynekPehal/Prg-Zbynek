<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Studenti</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Studenti</h1>

        <div class="mb-8">
            <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Přidej nového studenta</h2>
            <form action="{{ route('students.store') }}" method="POST" class="flex gap-2">
                @csrf
                <input type="text" name="name" placeholder="Napište jméno..." class="flex-1 border p-2 rounded">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Uložit jméno</button>
            </form>
        </div>

        <div>
            <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Tabulka studentů</h2>
            <div class="border rounded">
                <div class="grid grid-cols-3 bg-gray-50 p-2 font-bold border-b text-sm text-gray-600">
                    <div class="col-span-2">Jméno</div>
                    <div>Akce</div>
                </div>
                @foreach($students as $student)
                <div class="grid grid-cols-3 p-2 border-b items-center last:border-0">
                    <div class="col-span-2">
                        <form action="{{ route('students.update', $student) }}" method="POST" class="flex gap-2">
                            @csrf @method('PUT')
                            <input type="text" name="name" value="{{ $student->name }}" class="border-blue-200 border rounded px-2 py-1 w-full focus:outline-none focus:ring-1">
                            <button type="submit" class="text-blue-600 text-xs font-bold whitespace-nowrap">Uložit změnu</button>
                        </form>
                    </div>
                    <div class="text-right">
                        <form action="{{ route('students.destroy', $student) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 text-sm">Smazat</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>