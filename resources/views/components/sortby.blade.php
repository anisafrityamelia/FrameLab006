<div class="flex flex-col sm:flex-row items-start sm:items-center gap-2 w-full sm:w-auto">
    <span class="{{ $labelClass ?? 'text-secondary' }}">Sort By</span>
    <select id="studioFilter"
      class="w-48 p-2 text-black border border-primary rounded focus:outline-none focus:ring-1 focus:ring-primary/40">
      <option value="all" selected>All Studio</option>
      <option value="Studio Photo">Studio Photo</option>
      <option value="Studio Space">Studio Space</option>
      <option value="Studio Video">Studio Video</option>
      <option value="Studio Partner">Studio Partner</option>
    </select>
</div>