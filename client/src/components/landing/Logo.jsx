export default function Logo() {
  return (
    <div className="relative w-32 h-32 flex items-center justify-center">
      <div className="absolute inset-0 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 rounded-3xl shadow-2xl rotate-12 animate-pulse"></div>

      <div className="relative bg-white rounded-2xl w-28 h-28 flex items-center justify-center shadow-xl">
        <div className="text-center">
          <div className="font-black text-2xl bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            WEB&apos;S
          </div>
          <div className="font-black text-3xl bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
            360
          </div>
        </div>
      </div>
    </div>
  );
}
