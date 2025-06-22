import Link from "next/link"
import Image from "next/image"
import {
  Search,
  Download,
  Star,
  Play,
  Filter,
  Grid3X3,
  Sparkles,
  TrendingUp,
  Eye,
  Heart,
  Share2,
  ArrowRight,
  Zap,
  Film,
  Tv,
  Crown,
} from "lucide-react"
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import { Badge } from "@/components/ui/badge"
import { Card, CardContent } from "@/components/ui/card"

const featuredMovies = [
  {
    id: 1,
    title: "Final Destination Bloodlines",
    year: "2025",
    type: "movie",
    poster: "/placeholder.svg?height=600&width=400",
    backdrop: "/placeholder.svg?height=400&width=800",
    quality: ["4K UHD", "1080p", "720p"],
    audio: ["Hindi", "English", "Tamil", "Telugu"],
    size: "3.2GB",
    rating: 7.2,
    genre: ["Horror", "Thriller"],
    trending: true,
    featured: true,
    views: "127K",
  },
  {
    id: 2,
    title: "Good Boy",
    year: "2025",
    type: "series",
    poster: "/placeholder.svg?height=600&width=400",
    quality: ["1080p", "720p"],
    audio: ["Hindi", "English", "Korean"],
    size: "1.8GB",
    rating: 8.1,
    genre: ["Comedy", "Drama"],
    seasons: 1,
    views: "89K",
  },
  {
    id: 3,
    title: "Poker Face",
    year: "2023",
    type: "movie",
    poster: "/placeholder.svg?height=600&width=400",
    quality: ["4K UHD", "1080p"],
    audio: ["Hindi", "English"],
    size: "3.2GB",
    rating: 7.8,
    genre: ["Crime", "Drama"],
    views: "156K",
  },
  {
    id: 4,
    title: "The Monkey",
    year: "2025",
    type: "movie",
    poster: "/placeholder.svg?height=600&width=400",
    quality: ["4K UHD", "1080p"],
    audio: ["Hindi", "English"],
    size: "2.1GB",
    rating: 6.9,
    genre: ["Horror", "Thriller"],
    views: "92K",
  },
  {
    id: 5,
    title: "Peaky Blinders",
    year: "2013-2022",
    type: "series",
    poster: "/placeholder.svg?height=600&width=400",
    quality: ["4K UHD", "1080p"],
    audio: ["Hindi", "English"],
    size: "15.2GB",
    rating: 8.8,
    genre: ["Crime", "Drama"],
    seasons: 6,
    views: "2.8M",
  },
  {
    id: 6,
    title: "October Sky",
    year: "1999",
    type: "movie",
    poster: "/placeholder.svg?height=600&width=400",
    quality: ["1080p"],
    audio: ["English", "Hindi"],
    size: "1.3GB",
    rating: 7.8,
    genre: ["Drama", "Biography"],
    views: "67K",
  },
  {
    id: 7,
    title: "Breaking Bad",
    year: "2008-2013",
    type: "series",
    poster: "/placeholder.svg?height=600&width=400",
    quality: ["4K UHD", "1080p"],
    audio: ["Hindi", "English"],
    size: "45.2GB",
    rating: 9.5,
    genre: ["Crime", "Drama"],
    seasons: 5,
    views: "5.2M",
  },
  {
    id: 8,
    title: "Dune: Part Two",
    year: "2024",
    type: "movie",
    poster: "/placeholder.svg?height=600&width=400",
    quality: ["4K UHD", "1080p", "720p"],
    audio: ["Hindi", "English"],
    size: "4.8GB",
    rating: 8.5,
    genre: ["Sci-Fi", "Adventure"],
    views: "892K",
  },
]

const categories = [
  { name: "All", icon: Grid3X3, active: true },
  { name: "Movies", icon: Film },
  { name: "Series", icon: Tv },
  { name: "4K UHD", icon: Crown },
  { name: "Trending", icon: TrendingUp },
]

export default function HomePage() {
  return (
    <div className="min-h-screen bg-gradient-to-br from-gray-900 via-black to-gray-900">
      {/* Animated Background */}
      <div className="fixed inset-0 overflow-hidden pointer-events-none">
        <div className="absolute -top-40 -right-40 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div className="absolute -bottom-40 -left-40 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div className="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-cyan-500/5 rounded-full blur-3xl animate-pulse delay-2000"></div>
      </div>

      {/* Header */}
      <header className="relative z-50 bg-black/30 backdrop-blur-xl border-b border-white/10 sticky top-0">
        <div className="max-w-7xl mx-auto px-6">
          <div className="flex items-center justify-between h-20">
            {/* Logo */}
            <Link href="/" className="flex items-center space-x-4 group">
              <div className="relative">
                <div className="absolute inset-0 bg-gradient-to-r from-purple-600 to-cyan-600 rounded-2xl blur opacity-75 group-hover:opacity-100 transition-opacity"></div>
                <div className="relative bg-gradient-to-r from-purple-600 to-cyan-600 p-3 rounded-2xl">
                  <Sparkles className="w-8 h-8 text-white" />
                </div>
              </div>
              <div>
                <h1 className="text-3xl font-black bg-gradient-to-r from-purple-400 via-pink-400 to-cyan-400 bg-clip-text text-transparent">
                  SpectraBox
                </h1>
                <p className="text-xs text-gray-400 font-medium tracking-wider">PREMIUM DOWNLOADS</p>
              </div>
            </Link>

            {/* Navigation */}
            <nav className="hidden lg:flex items-center space-x-8">
              {categories.map((category) => (
                <Link
                  key={category.name}
                  href={`/${category.name.toLowerCase()}`}
                  className={`flex items-center space-x-2 px-4 py-2 rounded-full transition-all duration-300 ${
                    category.active
                      ? "bg-gradient-to-r from-purple-600 to-cyan-600 text-white shadow-lg shadow-purple-500/25"
                      : "text-gray-300 hover:text-white hover:bg-white/10"
                  }`}
                >
                  <category.icon className="w-4 h-4" />
                  <span className="font-medium">{category.name}</span>
                </Link>
              ))}
            </nav>

            {/* Search */}
            <div className="flex items-center space-x-4">
              <div className="relative hidden md:block">
                <div className="absolute inset-0 bg-gradient-to-r from-purple-600/20 to-cyan-600/20 rounded-full blur"></div>
                <div className="relative flex items-center">
                  <Search className="absolute left-4 w-5 h-5 text-gray-400" />
                  <Input
                    placeholder="Search movies, series..."
                    className="pl-12 pr-6 py-3 w-80 bg-white/10 border-white/20 rounded-full text-white placeholder:text-gray-400 focus:bg-white/20 focus:border-purple-500/50 transition-all"
                  />
                </div>
              </div>
              <Button className="bg-gradient-to-r from-purple-600 to-cyan-600 hover:from-purple-700 hover:to-cyan-700 text-white rounded-full px-6">
                <Filter className="w-4 h-4 mr-2" />
                Filter
              </Button>
            </div>
          </div>
        </div>
      </header>

      {/* Hero Section */}
      <section className="relative overflow-hidden py-20">
        <div className="absolute inset-0 bg-gradient-to-r from-black via-transparent to-black"></div>
        <Image
          src={featuredMovies[0].backdrop || "/placeholder.svg"}
          alt="Hero Background"
          fill
          className="object-cover opacity-20"
        />
        <div className="relative z-10 max-w-7xl mx-auto px-6">
          <div className="text-center max-w-4xl mx-auto">
            <div className="flex items-center justify-center space-x-4 mb-8">
              <Badge className="bg-gradient-to-r from-red-500 to-pink-500 text-white border-0 px-4 py-2 text-sm">
                <TrendingUp className="w-4 h-4 mr-2" />
                #1 Trending Now
              </Badge>
              <Badge className="bg-gradient-to-r from-green-500 to-emerald-500 text-white border-0 px-4 py-2 text-sm">
                <Crown className="w-4 h-4 mr-2" />
                Premium Quality
              </Badge>
            </div>
            <h1 className="text-6xl md:text-8xl font-black text-white mb-6 leading-tight">
              Download
              <span className="block bg-gradient-to-r from-purple-400 via-pink-400 to-cyan-400 bg-clip-text text-transparent">
                Premium Content
              </span>
            </h1>
            <p className="text-xl text-gray-300 mb-12 leading-relaxed max-w-2xl mx-auto">
              Experience the ultimate entertainment destination with 4K movies, premium series, and exclusive content in
              multiple languages.
            </p>
            <div className="flex items-center justify-center space-x-6">
              <Button
                size="lg"
                className="bg-gradient-to-r from-purple-600 to-cyan-600 hover:from-purple-700 hover:to-cyan-700 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg shadow-purple-500/25"
              >
                <Download className="w-5 h-5 mr-2" />
                Start Downloading
              </Button>
              <Button
                size="lg"
                variant="outline"
                className="border-white/30 text-white hover:bg-white/10 px-8 py-4 rounded-full text-lg font-semibold"
              >
                <Play className="w-5 h-5 mr-2" />
                Watch Trailer
              </Button>
            </div>
          </div>
        </div>
      </section>

      {/* Stats Section */}
      <section className="py-16 border-y border-white/10 bg-white/5 backdrop-blur-sm">
        <div className="max-w-7xl mx-auto px-6">
          <div className="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div className="text-center">
              <div className="text-4xl font-black text-white mb-2">2.5K+</div>
              <div className="text-gray-400 font-medium">Movies</div>
            </div>
            <div className="text-center">
              <div className="text-4xl font-black text-white mb-2">850+</div>
              <div className="text-gray-400 font-medium">TV Series</div>
            </div>
            <div className="text-center">
              <div className="text-4xl font-black text-white mb-2">4K UHD</div>
              <div className="text-gray-400 font-medium">Quality</div>
            </div>
            <div className="text-center">
              <div className="text-4xl font-black text-white mb-2">24/7</div>
              <div className="text-gray-400 font-medium">Updates</div>
            </div>
          </div>
        </div>
      </section>

      {/* Content Grid */}
      <section className="py-20">
        <div className="max-w-7xl mx-auto px-6">
          <div className="flex items-center justify-between mb-12">
            <div>
              <h2 className="text-4xl font-black text-white mb-2">Latest Releases</h2>
              <p className="text-gray-400">Discover the newest movies and series</p>
            </div>
            <Button variant="outline" className="border-white/20 text-white hover:bg-white/10 rounded-full px-6">
              View All
              <ArrowRight className="w-4 h-4 ml-2" />
            </Button>
          </div>

          {/* Movies Grid - Centered with padding */}
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 max-w-6xl mx-auto">
            {featuredMovies.map((item) => (
              <ContentCard key={item.id} item={item} />
            ))}
          </div>

          {/* Load More */}
          <div className="text-center mt-16">
            <Button className="bg-gradient-to-r from-purple-600 to-cyan-600 hover:from-purple-700 hover:to-cyan-700 text-white px-12 py-4 rounded-full text-lg font-semibold shadow-lg shadow-purple-500/25">
              Load More Content
              <Zap className="w-5 h-5 ml-2" />
            </Button>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-black/50 backdrop-blur-xl border-t border-white/10 py-16">
        <div className="max-w-7xl mx-auto px-6">
          <div className="grid grid-cols-1 md:grid-cols-4 gap-12">
            <div className="col-span-1 md:col-span-2">
              <Link href="/" className="flex items-center space-x-4 mb-6">
                <div className="bg-gradient-to-r from-purple-600 to-cyan-600 p-3 rounded-2xl">
                  <Sparkles className="w-8 h-8 text-white" />
                </div>
                <div>
                  <h3 className="text-3xl font-black bg-gradient-to-r from-purple-400 via-pink-400 to-cyan-400 bg-clip-text text-transparent">
                    SpectraBox
                  </h3>
                  <p className="text-xs text-gray-400 font-medium tracking-wider">PREMIUM DOWNLOADS</p>
                </div>
              </Link>
              <p className="text-gray-400 mb-6 max-w-md leading-relaxed">
                Your ultimate destination for premium entertainment. Download the latest movies and TV series in
                stunning 4K quality with multi-language support.
              </p>
              <div className="flex space-x-4">
                <Button className="bg-blue-600 hover:bg-blue-700 text-white rounded-full px-6">
                  <svg className="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0C5.374 0 0 5.373 0 12s5.374 12 12 12 12-5.373 12-12S18.626 0 12 0zm5.568 8.16c-.169 1.858-.896 3.605-2.068 4.777-1.172 1.172-2.92 1.899-4.777 2.068-.3.027-.605.041-.91.041-.306 0-.611-.014-.91-.041-1.858-.169-3.605-.896-4.777-2.068C2.954 11.765 2.227 10.018 2.058 8.16 2.031 7.86 2.017 7.555 2.017 7.25c0-.306.014-.611.041-.91.169-1.858.896-3.605 2.068-4.777C5.298 0.391 7.045-.336 8.903-.505c.3-.027.605-.041.91-.041.306 0 .611.014.91.041 1.858.169 3.605.896 4.777 2.068 1.172 1.172 1.899 2.92 2.068 4.777.027.3.041.605.041.91 0 .306-.014.611-.041.91z" />
                  </svg>
                  Telegram
                </Button>
              </div>
            </div>
            <div>
              <h4 className="font-bold text-white mb-6">Categories</h4>
              <ul className="space-y-3 text-gray-400">
                <li>
                  <Link href="#" className="hover:text-white transition-colors">
                    4K Movies
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-white transition-colors">
                    1080p Movies
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-white transition-colors">
                    TV Series
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-white transition-colors">
                    Dual Audio
                  </Link>
                </li>
              </ul>
            </div>
            <div>
              <h4 className="font-bold text-white mb-6">Genres</h4>
              <ul className="space-y-3 text-gray-400">
                <li>
                  <Link href="#" className="hover:text-white transition-colors">
                    Action
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-white transition-colors">
                    Comedy
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-white transition-colors">
                    Horror
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-white transition-colors">
                    Thriller
                  </Link>
                </li>
              </ul>
            </div>
          </div>
          <div className="border-t border-white/10 mt-12 pt-8 text-center text-gray-400">
            <p>&copy; 2025 SpectraBox. All rights reserved. Educational purposes only.</p>
          </div>
        </div>
      </footer>
    </div>
  )
}

function ContentCard({ item }: { item: any }) {
  return (
    <Card className="group bg-white/5 border-white/10 hover:bg-white/10 transition-all duration-500 overflow-hidden backdrop-blur-sm hover:scale-105 hover:shadow-2xl hover:shadow-purple-500/20">
      <div className="relative">
        <Image
          src={item.poster || "/placeholder.svg"}
          alt={item.title}
          width={400}
          height={600}
          className="w-full h-80 object-cover transition-transform duration-700 group-hover:scale-110"
        />

        {/* Gradient Overlay */}
        <div className="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
          <div className="absolute bottom-6 left-6 right-6">
            <div className="flex items-center justify-between mb-4">
              <Button
                size="sm"
                className="bg-gradient-to-r from-purple-600 to-cyan-600 hover:from-purple-700 hover:to-cyan-700 text-white rounded-full"
              >
                <Download className="w-3 h-3 mr-1" />
                Download
              </Button>
              <div className="flex space-x-2">
                <Button size="sm" variant="ghost" className="text-white hover:bg-white/20 p-2 rounded-full">
                  <Heart className="w-4 h-4" />
                </Button>
                <Button size="sm" variant="ghost" className="text-white hover:bg-white/20 p-2 rounded-full">
                  <Share2 className="w-4 h-4" />
                </Button>
              </div>
            </div>
          </div>
        </div>

        {/* Top Badges */}
        <div className="absolute top-4 left-4 flex flex-col space-y-2">
          <Badge className="bg-gradient-to-r from-green-500 to-emerald-500 text-white border-0 text-xs font-bold">
            {item.quality[0]}
          </Badge>
          {item.type === "series" && item.seasons && (
            <Badge className="bg-gradient-to-r from-blue-500 to-cyan-500 text-white border-0 text-xs font-bold">
              {item.seasons}S
            </Badge>
          )}
          {item.trending && (
            <Badge className="bg-gradient-to-r from-red-500 to-pink-500 text-white border-0 text-xs font-bold">
              <TrendingUp className="w-3 h-3 mr-1" />
              HOT
            </Badge>
          )}
        </div>

        {/* Rating */}
        <div className="absolute top-4 right-4 flex items-center space-x-1 bg-black/80 text-white px-3 py-1 rounded-full text-sm backdrop-blur-sm">
          <Star className="w-4 h-4 fill-yellow-400 text-yellow-400" />
          <span className="font-bold">{item.rating}</span>
        </div>

        {/* Views */}
        <div className="absolute bottom-4 right-4 flex items-center space-x-1 bg-black/80 text-white px-3 py-1 rounded-full text-xs backdrop-blur-sm">
          <Eye className="w-3 h-3" />
          <span className="font-medium">{item.views}</span>
        </div>
      </div>

      <CardContent className="p-6">
        <h3 className="font-bold text-white mb-3 text-lg line-clamp-1 group-hover:text-transparent group-hover:bg-gradient-to-r group-hover:from-purple-400 group-hover:to-cyan-400 group-hover:bg-clip-text transition-all">
          {item.title}
        </h3>

        <div className="flex items-center justify-between mb-4">
          <span className="text-gray-400 font-medium">{item.year}</span>
          <Badge className="bg-white/10 text-gray-300 border-0 text-xs">{item.size}</Badge>
        </div>

        <div className="flex flex-wrap gap-2 mb-4">
          {item.genre.slice(0, 2).map((g: string) => (
            <Badge
              key={g}
              variant="secondary"
              className="text-xs bg-white/10 text-gray-300 border-0 hover:bg-purple-500/20 hover:text-purple-300 transition-colors cursor-pointer"
            >
              {g}
            </Badge>
          ))}
        </div>

        <div className="flex flex-wrap gap-1">
          {item.audio.slice(0, 3).map((a: string) => (
            <Badge
              key={a}
              className="text-xs bg-gradient-to-r from-blue-500/20 to-cyan-500/20 text-blue-300 border-blue-500/30"
            >
              {a}
            </Badge>
          ))}
        </div>
      </CardContent>
    </Card>
  )
}
