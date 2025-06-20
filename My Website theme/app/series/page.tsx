import { SeriesCard } from "@/components/series-card"
import { SearchBar } from "@/components/search-bar"
import Link from "next/link"
import { ArrowLeft } from "lucide-react"
import { Logo } from "@/components/logo"

const series = [
  {
    id: 1,
    title: "Game of Thrones",
    year: "2011-2019",
    rating: 9.3,
    seasons: 8,
    episodes: 73,
    quality: "4K | 1080p | 720p",
    poster: "/placeholder.svg?height=300&width=200",
    status: "Completed",
  },
  {
    id: 2,
    title: "Breaking Bad",
    year: "2008-2013",
    rating: 9.5,
    seasons: 5,
    episodes: 62,
    quality: "4K | 1080p | 720p",
    poster: "/placeholder.svg?height=300&width=200",
    status: "Completed",
  },
  {
    id: 3,
    title: "Stranger Things",
    year: "2016-2025",
    rating: 8.7,
    seasons: 5,
    episodes: 42,
    quality: "4K | 1080p | 720p",
    poster: "/placeholder.svg?height=300&width=200",
    status: "Ongoing",
  },
  {
    id: 4,
    title: "The Witcher",
    year: "2019-Present",
    rating: 8.2,
    seasons: 3,
    episodes: 24,
    quality: "4K | 1080p | 720p",
    poster: "/placeholder.svg?height=300&width=200",
    status: "Ongoing",
  },
  {
    id: 5,
    title: "House of the Dragon",
    year: "2022-Present",
    rating: 8.5,
    seasons: 2,
    episodes: 18,
    quality: "4K | 1080p | 720p",
    poster: "/placeholder.svg?height=300&width=200",
    status: "Ongoing",
  },
  {
    id: 6,
    title: "The Boys",
    year: "2019-Present",
    rating: 8.7,
    seasons: 4,
    episodes: 32,
    quality: "4K | 1080p | 720p",
    poster: "/placeholder.svg?height=300&width=200",
    status: "Ongoing",
  },
]

export default function SeriesPage() {
  return (
    <div className="min-h-screen bg-gray-900 text-white">
      {/* Header */}
      <header className="bg-black/50 backdrop-blur-sm sticky top-0 z-50">
        <div className="container mx-auto px-4 py-4">
          <div className="flex items-center justify-between">
            <Link href="/">
              <Logo />
            </Link>
            <div className="flex items-center gap-6">
              <nav className="hidden md:flex space-x-6">
                <Link href="/" className="hover:text-yellow-400 transition-colors">
                  Home
                </Link>
                <Link href="/movies" className="hover:text-yellow-400 transition-colors">
                  Movies
                </Link>
                <Link href="/series" className="text-yellow-400">
                  Series
                </Link>
                <Link href="#" className="hover:text-yellow-400 transition-colors">
                  Latest
                </Link>
              </nav>
              <Link href="/" className="flex items-center gap-2 hover:text-yellow-400 transition-colors">
                <ArrowLeft className="w-4 h-4" />
                Back to Home
              </Link>
            </div>
          </div>
        </div>
      </header>

      {/* Page Title */}
      <section className="container mx-auto px-4 py-8">
        <h1 className="text-4xl font-bold text-center mb-8">TV Series Collection</h1>
        <SearchBar />
      </section>

      {/* Series Grid */}
      <section className="container mx-auto px-4 py-8">
        <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6">
          {series.map((show) => (
            <SeriesCard key={show.id} series={show} />
          ))}
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-black mt-16 py-8">
        <div className="container mx-auto px-4 text-center">
          <p className="text-gray-400">© 2024 SpectraBox. All rights reserved.</p>
          <p className="text-sm text-gray-500 mt-2">Download latest TV series in 4K, 1080p, 720p quality</p>
        </div>
      </footer>
    </div>
  )
}
