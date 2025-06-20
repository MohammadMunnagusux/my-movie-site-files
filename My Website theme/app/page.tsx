import { MovieCard } from "@/components/movie-card"
import { SearchBar } from "@/components/search-bar"
import { FeaturedMovie } from "@/components/featured-movie"
import { Logo } from "@/components/logo"

const featuredMovie = {
  id: 1,
  title: "Avengers: Endgame",
  year: 2019,
  rating: 8.4,
  duration: "181 min",
  quality: "4K | 1080p | 720p",
  synopsis:
    "After the devastating events of Avengers: Infinity War, the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos' actions and restore balance to the universe.",
  poster: "/placeholder.svg?height=600&width=400",
  backdrop: "/placeholder.svg?height=400&width=800",
  downloadLinks: {
    "4K": "https://example.com/4k",
    "1080p": "https://example.com/1080p",
    "720p": "https://example.com/720p",
  },
}

const movies = [
  {
    id: 1,
    title: "Avengers: Endgame",
    year: 2019,
    rating: 8.4,
    quality: "4K | 1080p | 720p",
    poster: "/placeholder.svg?height=300&width=200",
  },
  {
    id: 2,
    title: "Spider-Man: No Way Home",
    year: 2021,
    rating: 8.2,
    quality: "4K | 1080p | 720p",
    poster: "/placeholder.svg?height=300&width=200",
  },
  {
    id: 3,
    title: "The Batman",
    year: 2022,
    rating: 7.8,
    quality: "4K | 1080p | 720p",
    poster: "/placeholder.svg?height=300&width=200",
  },
  {
    id: 4,
    title: "Top Gun: Maverick",
    year: 2022,
    rating: 8.3,
    quality: "4K | 1080p | 720p",
    poster: "/placeholder.svg?height=300&width=200",
  },
  {
    id: 5,
    title: "Black Panther",
    year: 2018,
    rating: 7.3,
    quality: "4K | 1080p | 720p",
    poster: "/placeholder.svg?height=300&width=200",
  },
  {
    id: 6,
    title: "Dune",
    year: 2021,
    rating: 8.0,
    quality: "4K | 1080p | 720p",
    poster: "/placeholder.svg?height=300&width=200",
  },
]

export default function HomePage() {
  return (
    <div className="min-h-screen bg-gray-900 text-white">
      {/* Header */}
      <header className="bg-black/50 backdrop-blur-sm sticky top-0 z-50">
        <div className="container mx-auto px-4 py-4">
          <div className="flex items-center justify-between">
            <Logo />
            <nav className="hidden md:flex space-x-6">
              <a href="#" className="hover:text-yellow-400 transition-colors">
                Home
              </a>
              <a href="#" className="hover:text-yellow-400 transition-colors">
                Movies
              </a>
              <a href="/series" className="hover:text-yellow-400 transition-colors">
                Series
              </a>
              <a href="#" className="hover:text-yellow-400 transition-colors">
                Latest
              </a>
            </nav>
          </div>
        </div>
      </header>

      {/* Featured Movie */}
      <FeaturedMovie movie={featuredMovie} />

      {/* Search Section */}
      <section className="container mx-auto px-4 py-8">
        <SearchBar />
      </section>

      {/* Latest Movies */}
      <section className="container mx-auto px-4 py-8">
        <h2 className="text-3xl font-bold mb-8 text-center">Latest Movies</h2>
        <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6">
          {movies.map((movie) => (
            <MovieCard key={movie.id} movie={movie} />
          ))}
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-black mt-16 py-8">
        <div className="container mx-auto px-4 text-center">
          <p className="text-gray-400">© 2024 SpectraBox. All rights reserved.</p>
          <p className="text-sm text-gray-500 mt-2">Download latest movies & series in 4K, 1080p, 720p quality</p>
        </div>
      </footer>
    </div>
  )
}
