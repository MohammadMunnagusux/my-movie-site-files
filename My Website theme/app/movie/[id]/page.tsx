import { Button } from "@/components/ui/button"
import { Star, Clock, Calendar, Download, ArrowLeft } from "lucide-react"
import Link from "next/link"
import { Logo } from "@/components/logo"

// Mock data - in real app, this would come from API/database
const movieData = {
  1: {
    id: 1,
    title: "Avengers: Endgame",
    year: 2019,
    rating: 8.4,
    duration: "181 min",
    quality: "4K | 1080p | 720p",
    synopsis:
      "After the devastating events of Avengers: Infinity War, the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos' actions and restore balance to the universe. No matter what consequences may be in store, and no matter who they face, the Avengers will do whatever it takes to reverse the course of this catastrophic event.",
    poster: "/placeholder.svg?height=600&width=400",
    backdrop: "/placeholder.svg?height=400&width=800",
    downloadLinks: {
      "4K": "https://example.com/4k",
      "1080p": "https://example.com/1080p",
      "720p": "https://example.com/720p",
    },
    genre: ["Action", "Adventure", "Drama"],
    director: "Anthony Russo, Joe Russo",
    cast: ["Robert Downey Jr.", "Chris Evans", "Mark Ruffalo", "Chris Hemsworth"],
    language: "Hindi | English",
    size: {
      "4K": "8.5 GB",
      "1080p": "2.1 GB",
      "720p": "1.2 GB",
    },
  },
}

export default function MoviePage({ params }: { params: { id: string } }) {
  const movie = movieData[1] // In real app, use params.id to fetch data

  if (!movie) {
    return <div>Movie not found</div>
  }

  return (
    <div className="min-h-screen bg-gray-900 text-white">
      {/* Header */}
      <header className="bg-black/50 backdrop-blur-sm sticky top-0 z-50">
        <div className="container mx-auto px-4 py-4">
          <div className="flex items-center justify-between">
            <Link href="/">
              <Logo />
            </Link>
            <Link href="/" className="flex items-center gap-2 hover:text-yellow-400 transition-colors">
              <ArrowLeft className="w-4 h-4" />
              Back to Home
            </Link>
          </div>
        </div>
      </header>

      {/* Movie Hero Section */}
      <section
        className="relative h-[50vh] bg-cover bg-center bg-no-repeat"
        style={{ backgroundImage: `url(${movie.backdrop})` }}
      >
        <div className="absolute inset-0 bg-black/70" />
        <div className="relative container mx-auto px-4 h-full flex items-end pb-8">
          <div>
            <h1 className="text-4xl md:text-5xl font-bold mb-4">{movie.title}</h1>
            <div className="flex flex-wrap items-center gap-4 text-sm">
              <div className="flex items-center gap-1">
                <Star className="w-4 h-4 text-yellow-400 fill-current" />
                <span>{movie.rating}</span>
              </div>
              <div className="flex items-center gap-1">
                <Calendar className="w-4 h-4" />
                <span>{movie.year}</span>
              </div>
              <div className="flex items-center gap-1">
                <Clock className="w-4 h-4" />
                <span>{movie.duration}</span>
              </div>
              <div className="bg-yellow-400 text-black px-2 py-1 rounded text-xs font-semibold">{movie.quality}</div>
            </div>
          </div>
        </div>
      </section>

      {/* Movie Details */}
      <section className="container mx-auto px-4 py-12">
        <div className="grid lg:grid-cols-3 gap-12">
          {/* Poster */}
          <div className="lg:col-span-1">
            <img
              src={movie.poster || "/placeholder.svg"}
              alt={movie.title}
              className="w-full max-w-sm mx-auto rounded-lg shadow-2xl"
            />
          </div>

          {/* Details */}
          <div className="lg:col-span-2 space-y-8">
            {/* Synopsis */}
            <div>
              <h2 className="text-2xl font-bold mb-4">Synopsis</h2>
              <p className="text-gray-300 leading-relaxed">{movie.synopsis}</p>
            </div>

            {/* Movie Info */}
            <div className="grid md:grid-cols-2 gap-6">
              <div>
                <h3 className="text-lg font-semibold mb-3">Movie Details</h3>
                <div className="space-y-2 text-sm">
                  <div>
                    <span className="text-gray-400">Director:</span> {movie.director}
                  </div>
                  <div>
                    <span className="text-gray-400">Genre:</span> {movie.genre.join(", ")}
                  </div>
                  <div>
                    <span className="text-gray-400">Language:</span> {movie.language}
                  </div>
                  <div>
                    <span className="text-gray-400">Quality:</span> {movie.quality}
                  </div>
                </div>
              </div>
              <div>
                <h3 className="text-lg font-semibold mb-3">Cast</h3>
                <div className="text-sm text-gray-300">{movie.cast.join(", ")}</div>
              </div>
            </div>

            {/* Download Section */}
            <div className="bg-gray-800 rounded-lg p-6">
              <h3 className="text-2xl font-bold mb-6 text-center">Download Links</h3>
              <div className="grid gap-4">
                {Object.entries(movie.downloadLinks).map(([quality, link]) => (
                  <div key={quality} className="flex items-center justify-between bg-gray-700 rounded-lg p-4">
                    <div>
                      <div className="font-semibold">{quality} Quality</div>
                      <div className="text-sm text-gray-400">
                        Size: {movie.size[quality as keyof typeof movie.size]}
                      </div>
                    </div>
                    <Button className="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold">
                      <Download className="w-4 h-4 mr-2" />
                      Download {quality}
                    </Button>
                  </div>
                ))}
              </div>
            </div>

            {/* Warning Notice */}
            <div className="bg-red-900/20 border border-red-500/30 rounded-lg p-4">
              <p className="text-sm text-red-300">
                <strong>Disclaimer:</strong> This is for educational purposes only. Please support the creators by
                watching movies through official platforms.
              </p>
            </div>
          </div>
        </div>
      </section>
    </div>
  )
}
