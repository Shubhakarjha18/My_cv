{{-- Education details --}}

<div class="overflow-x-auto border border-gray-300 rounded-lg shadow-lg">
  <table class="min-w-full bg-blue-100 border-collapse">
      <thead>
          <tr class="bg-blue-500 text-white text-left">
              <th class="py-3 px-4 border-b-2 border-gray-300">Level</th>
              <th class="py-3 px-4 border-b-2 border-gray-300">College</th>
              <th class="py-3 px-4 border-b-2 border-gray-300">Location</th>
              <th class="py-3 px-4 border-b-2 border-gray-300">GPA</th>
          </tr>
      </thead>
      <tbody>
          @foreach($educations as $education)
          <tr class="hover:bg-blue-200 transition duration-200">
              <td class="py-2 px-4 border-b border-gray-300">{{ $education->Level }}</td>
              <td class="py-2 px-4 border-b border-gray-300">{{ $education->college }}</td>
              <td class="py-2 px-4 border-b border-gray-300">{{ $education->Location }}</td>
              <td class="py-2 px-4 border-b border-gray-300">{{ $education->GPA }}</td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>

{{-- Education details --}}
<br><br>
