import Link from "next/link"
import Image from "next/image"
import {
  Search,
  Menu,
  Download,
  Star,
  Calendar,
  Clock,
  Play,
  Filter,
  Grid,
  Zap,
  Film,
  Tv,
  TrendingUp,
  Eye,
  Heart,
  Share2,
} from "lucide-react"
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import { Badge } from "@/components/ui/badge"
import { Card, CardContent } from "@/components/ui/card"
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs"
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select"

const featuredContent = [
  {
    id: 1,
    title: "Final Destination Bloodlines",
    year: "2025",
    type: "movie",
    poster: "/placeholder.svg?height=600&width=400",
    backdrop: "/placeholder.svg?height=400&width=800",
    quality: ["4K UHD", "1080p", "720p"],
    audio: ["Hindi", "English", "Tamil", "Telugu"],
    format: "WEB-DL",
    size: "3.2GB",
    rating: 7.2,
    genre: ["Horror", "Thriller"],
    description: "Death returns with a vengeance in this latest installment of the Final Destination franchise.",
    trending: true,
    featured: true,
  },
  {
    id: 2,
    title: "Peaky Blinders",
    year: "2013-2022",
    type: "series",
    poster: "/placeholder.svg?height=600&width=400",
    backdrop: "/placeholder.svg?height=400&width=800",
    quality: ["4K UHD", "1080p"],
    audio: ["Hindi", "English"],
    format: "BluRay",
    size: "15.2GB",
    rating: 8.8,
    genre: ["Crime", "Drama"],
    description:
      "A gangster family epic set in 1900s England, centering on a gang who sew razor blades in the peaks of their caps.",
    trending: true,
    seasons: 6,
  },
  {
    id: 3,
    title: "Good Boy",
    year: "2025",
    type: "series",
    poster: "/placeholder.svg?height=600&width=400",
    backdrop: "/placeholder.svg?height=400&width=800",
    quality: ["1080p", "720p"],
    audio: ["Hindi", "English", "Korean"],
    format: "WEB-DL",
    size: "1.8GB",
    rating: 8.1,
    genre: ["Comedy", "Drama"],
    description: "A heartwarming story about friendship and growing up in modern Korea.",
    seasons: 1,
  },
]

const movies = [
  {
    id: 4,
    title: "Poker Face",
    year: "2023",
    type: "movie",
    poster: "/placeholder.svg?height=600&width=400",
    quality: ["4K UHD", "1080p"],
    audio: ["Hindi", "English"],
    format: "BluRay",
    size: "3.2GB",
    rating: 7.8,
    genre: ["Crime", "Drama"],
    views: "125K",
  },
  {
    id: 5,
    title: "The Monkey",
    year: "2025",
    type: "movie",
    poster: "/placeholder.svg?height=600&width=400",
    quality: ["4K UHD", "1080p"],
    audio: ["Hindi", "English"],
    format: "WEB-DL",
    size: "2.1GB",
    rating: 6.9,
    genre: ["Horror", "Thriller"],
    views: "89K",
  },
  {
    id: 6,
    title: "October Sky",
    year: "1999",
    type: "movie",
    poster: "/placeholder.svg?height=600&width=400",
    quality: ["1080p"],
    audio: ["English", "Hindi"],
    format: "BluRay",
    size: "1.3GB",
    rating: 7.8,
    genre: ["Drama", "Biography"],
    views: "67K",
  },
]

const categories = [
  { name: "All", icon: Grid, count: "2.5K+" },
  { name: "Movies", icon: Film, count: "1.8K+" },
  { name: "Series", icon: Tv, count: "700+" },
  { name: "4K UHD", icon: Zap, count: "450+" },
  { name: "Trending", icon: TrendingUp, count: "120+" },
]

const quickFilters = [
  "Latest Releases",
  "4K Movies",
  "Hindi Dubbed",
  "English Movies",
  "Web Series",
  "Dual Audio",
  "Action",
  "Comedy",
  "Horror",
  "Thriller",
]

export default function HomePage() {
  return (
    <div className="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
      {/* Header */}
      <header className="bg-black/20 backdrop-blur-md border-b border-white/10 sticky top-0 z-50">
        <div className="container mx-auto px-4">
          <div className="flex items-center justify-between h-16">
            <Link href="/" className="flex items-center space-x-3">
              <div className="relative">
                <div className="bg-gradient-to-r from-purple-500 via-blue-500 to-cyan-500 p-2 rounded-xl">
                  <Zap className="w-6 h-6 text-white" />
                </div>
                <div className="absolute -top-1 -right-1 w-3 h-3 bg-gradient-to-r from-pink-500 to-red-500 rounded-full animate-pulse"></div>
              </div>
              <div>
                <span className="text-2xl font-bold bg-gradient-to-r from-purple-400 via-blue-400 to-cyan-400 bg-clip-text text-transparent">
                  SpectraBox
                </span>
                <div className="text-xs text-gray-400 -mt-1">Premium Downloads</div>
              </div>
            </Link>

            <nav className="hidden lg:flex items-center space-x-8">
              {categories.map((category) => (
                <Link
                  key={category.name}
                  href={`/${category.name.toLowerCase()}`}
                  className="flex items-center space-x-2 text-gray-300 hover:text-white transition-all duration-300 group"
                >
                  <category.icon className="w-4 h-4 group-hover:text-purple-400 transition-colors" />
                  <span className="font-medium">{category.name}</span>
                  <Badge variant="secondary" className="text-xs bg-white/10 text-gray-300 border-0">
                    {category.count}
                  </Badge>
                </Link>
              ))}
            </nav>

            <div className="flex items-center space-x-4">
              <div className="relative hidden md:block">
                <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" />
                <Input
                  placeholder="Search movies, series..."
                  className="pl-10 w-80 bg-white/10 border-white/20 text-white placeholder:text-gray-400 focus:bg-white/20 transition-all"
                />
              </div>
              <Button variant="ghost" size="icon" className="lg:hidden text-white">
                <Menu className="w-5 h-5" />
              </Button>
            </div>
          </div>
        </div>
      </header>

      {/* Hero Section */}
      <section className="relative overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-r from-black via-black/50 to-transparent z-10"></div>
        <Image
          src={featuredContent[0].backdrop || "/placeholder.svg"}
          alt="Hero Background"
          fill
          className="object-cover opacity-30"
        />
        <div className="relative z-20 container mx-auto px-4 py-20">
          <div className="max-w-2xl">
            <div className="flex items-center space-x-2 mb-4">
              <Badge className="bg-gradient-to-r from-red-500 to-pink-500 text-white border-0">
                <TrendingUp className="w-3 h-3 mr-1" />
                Trending Now
              </Badge>
              <Badge className="bg-gradient-to-r from-purple-500 to-blue-500 text-white border-0">
                {featuredContent[0].type === "movie" ? "Movie" : "Series"}
              </Badge>
            </div>
            <h1 className="text-5xl md:text-7xl font-bold text-white mb-4 leading-tight">{featuredContent[0].title}</h1>
            <p className="text-xl text-gray-300 mb-6 leading-relaxed">{featuredContent[0].description}</p>
            <div className="flex items-center space-x-6 mb-8">
              <div className="flex items-center space-x-2">
                <Star className="w-5 h-5 fill-yellow-400 text-yellow-400" />
                <span className="text-white font-semibold">{featuredContent[0].rating}</span>
              </div>
              <div className="flex items-center space-x-2">
                <Calendar className="w-5 h-5 text-gray-400" />
                <span className="text-gray-300">{featuredContent[0].year}</span>
              </div>
              <div className="flex space-x-2">
                {featuredContent[0].quality.slice(0, 2).map((q) => (
                  <Badge key={q} className="bg-green-500/20 text-green-400 border-green-500/30">
                    {q}
                  </Badge>
                ))}
              </div>
            </div>
            <div className="flex items-center space-x-4">
              <Button
                size="lg"
                className="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-8"
              >
                <Download className="w-5 h-5 mr-2" />
                Download Now
              </Button>
              <Button size="lg" variant="outline" className="border-white/30 text-white hover:bg-white/10">
                <Play className="w-5 h-5 mr-2" />
                Watch Trailer
              </Button>
            </div>
          </div>
        </div>
      </section>

      <div className="container mx-auto px-4 py-12">
        {/* Quick Filters */}
        <div className="mb-8">
          <div className="flex items-center justify-between mb-6">
            <h2 className="text-2xl font-bold text-white">Browse Content</h2>
            <div className="flex items-center space-x-4">
              <Select>
                <SelectTrigger className="w-40 bg-white/10 border-white/20 text-white">
                  <SelectValue placeholder="Sort by" />
                </SelectTrigger>
                <SelectContent>
                  <SelectItem value="latest">Latest</SelectItem>
                  <SelectItem value="popular">Most Popular</SelectItem>
                  <SelectItem value="rating">Highest Rated</SelectItem>
                  <SelectItem value="year">Release Year</SelectItem>
                </SelectContent>
              </Select>
              <Button variant="outline" size="icon" className="border-white/20 text-white hover:bg-white/10">
                <Filter className="w-4 h-4" />
              </Button>
            </div>
          </div>

          <div className="flex flex-wrap gap-3 mb-8">
            {quickFilters.map((filter) => (
              <Button
                key={filter}
                variant="outline"
                size="sm"
                className="border-white/20 text-gray-300 hover:bg-white/10 hover:text-white transition-all"
              >
                {filter}
              </Button>
            ))}
          </div>
        </div>

        {/* Content Tabs */}
        <Tabs defaultValue="all" className="w-full">
          <TabsList className="grid w-full grid-cols-4 lg:w-auto lg:grid-cols-none lg:flex bg-white/10 border-white/20">
            <TabsTrigger value="all" className="data-[state=active]:bg-purple-600 data-[state=active]:text-white">
              All Content
            </TabsTrigger>
            <TabsTrigger value="movies" className="data-[state=active]:bg-purple-600 data-[state=active]:text-white">
              Movies
            </TabsTrigger>
            <TabsTrigger value="series" className="data-[state=active]:bg-purple-600 data-[state=active]:text-white">
              TV Series
            </TabsTrigger>
            <TabsTrigger value="trending" className="data-[state=active]:bg-purple-600 data-[state=active]:text-white">
              Trending
            </TabsTrigger>
          </TabsList>

          <TabsContent value="all" className="mt-8">
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
              {[...featuredContent, ...movies].map((item) => (
                <ContentCard key={item.id} item={item} />
              ))}
            </div>
          </TabsContent>

          <TabsContent value="movies" className="mt-8">
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
              {[...featuredContent, ...movies]
                .filter((item) => item.type === "movie")
                .map((item) => (
                  <ContentCard key={item.id} item={item} />
                ))}
            </div>
          </TabsContent>

          <TabsContent value="series" className="mt-8">
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
              {[...featuredContent, ...movies]
                .filter((item) => item.type === "series")
                .map((item) => (
                  <ContentCard key={item.id} item={item} />
                ))}
            </div>
          </TabsContent>

          <TabsContent value="trending" className="mt-8">
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
              {featuredContent
                .filter((item) => item.trending)
                .map((item) => (
                  <ContentCard key={item.id} item={item} />
                ))}
            </div>
          </TabsContent>
        </Tabs>

        {/* Load More */}
        <div className="text-center mt-12">
          <Button className="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-8 py-3">
            Load More Content
          </Button>
        </div>
      </div>

      {/* Footer */}
      <footer className="bg-black/40 backdrop-blur-md border-t border-white/10 mt-20">
        <div className="container mx-auto px-4 py-12">
          <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div className="col-span-1 md:col-span-2">
              <Link href="/" className="flex items-center space-x-3 mb-4">
                <div className="bg-gradient-to-r from-purple-500 via-blue-500 to-cyan-500 p-2 rounded-xl">
                  <Zap className="w-6 h-6 text-white" />
                </div>
                <span className="text-2xl font-bold bg-gradient-to-r from-purple-400 via-blue-400 to-cyan-400 bg-clip-text text-transparent">
                  SpectraBox
                </span>
              </Link>
              <p className="text-gray-400 mb-4 max-w-md">
                Your ultimate destination for high-quality movie and TV series downloads. Experience entertainment in
                stunning 4K, 1080p, and more.
              </p>
              <div className="flex space-x-4">
                <Button size="sm" className="bg-blue-600 hover:bg-blue-700">
                  <svg className="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0C5.374 0 0 5.373 0 12s5.374 12 12 12 12-5.373 12-12S18.626 0 12 0zm5.568 8.16c-.169 1.858-.896 3.605-2.068 4.777-1.172 1.172-2.92 1.899-4.777 2.068-.3.027-.605.041-.91.041-.306 0-.611-.014-.91-.041-1.858-.169-3.605-.896-4.777-2.068C2.954 11.765 2.227 10.018 2.058 8.16 2.031 7.86 2.017 7.555 2.017 7.25c0-.306.014-.611.041-.91.169-1.858.896-3.605 2.068-4.777C5.298 0.391 7.045-.336 8.903-.505c.3-.027.605-.041.91-.041.306 0 .611.014.91.041 1.858.169 3.605.896 4.777 2.068 1.172 1.172 1.899 2.92 2.068 4.777.027.3.041.605.041.91 0 .306-.014.611-.041.91z" />
                  </svg>
                  Telegram
                </Button>
              </div>
            </div>
            <div>
              <h4 className="font-semibold text-white mb-4">Categories</h4>
              <ul className="space-y-2 text-sm text-gray-400">
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
                <li>
                  <Link href="#" className="hover:text-white transition-colors">
                    Hindi Dubbed
                  </Link>
                </li>
              </ul>
            </div>
            <div>
              <h4 className="font-semibold text-white mb-4">Genres</h4>
              <ul className="space-y-2 text-sm text-gray-400">
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
                <li>
                  <Link href="#" className="hover:text-white transition-colors">
                    Drama
                  </Link>
                </li>
              </ul>
            </div>
          </div>
          <div className="border-t border-white/10 mt-8 pt-8 text-center text-sm text-gray-400">
            <p>&copy; 2025 SpectraBox. All rights reserved. Educational purposes only.</p>
          </div>
        </div>
      </footer>
    </div>
  )
}

function ContentCard({ item }: { item: any }) {
  return (
    <Card className="group bg-white/5 border-white/10 hover:bg-white/10 transition-all duration-300 overflow-hidden backdrop-blur-sm">
      <div className="relative">
        <Image
          src={item.poster || "/placeholder.svg"}
          alt={item.title}
          width={400}
          height={600}
          className="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-500"
        />

        {/* Overlay */}
        <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
          <div className="absolute bottom-4 left-4 right-4">
            <div className="flex items-center justify-between mb-2">
              <Button size="sm" className="bg-purple-600 hover:bg-purple-700 text-white">
                <Download className="w-3 h-3 mr-1" />
                Download
              </Button>
              <div className="flex space-x-1">
                <Button size="sm" variant="ghost" className="text-white hover:bg-white/20 p-1">
                  <Heart className="w-4 h-4" />
                </Button>
                <Button size="sm" variant="ghost" className="text-white hover:bg-white/20 p-1">
                  <Share2 className="w-4 h-4" />
                </Button>
              </div>
            </div>
          </div>
        </div>

        {/* Top Badges */}
        <div className="absolute top-3 left-3 flex flex-col space-y-2">
          <Badge className="bg-gradient-to-r from-green-500 to-emerald-500 text-white border-0 text-xs">
            {item.quality[0]}
          </Badge>
          {item.type === "series" && item.seasons && (
            <Badge className="bg-gradient-to-r from-blue-500 to-cyan-500 text-white border-0 text-xs">
              {item.seasons} Seasons
            </Badge>
          )}
          {item.trending && (
            <Badge className="bg-gradient-to-r from-red-500 to-pink-500 text-white border-0 text-xs">
              <TrendingUp className="w-3 h-3 mr-1" />
              Trending
            </Badge>
          )}
        </div>

        {/* Rating */}
        <div className="absolute top-3 right-3 flex items-center space-x-1 bg-black/70 text-white px-2 py-1 rounded-full text-xs">
          <Star className="w-3 h-3 fill-yellow-400 text-yellow-400" />
          <span className="font-medium">{item.rating}</span>
        </div>

        {/* Views (if available) */}
        {item.views && (
          <div className="absolute bottom-3 right-3 flex items-center space-x-1 bg-black/70 text-white px-2 py-1 rounded-full text-xs">
            <Eye className="w-3 h-3" />
            <span>{item.views}</span>
          </div>
        )}
      </div>

      <CardContent className="p-4">
        <h3 className="font-semibold text-white mb-2 line-clamp-1 group-hover:text-purple-400 transition-colors">
          {item.title} ({item.year})
        </h3>

        <div className="flex flex-wrap gap-1 mb-3">
          {item.genre.slice(0, 2).map((g: string) => (
            <Badge key={g} variant="secondary" className="text-xs bg-white/10 text-gray-300 border-0">
              {g}
            </Badge>
          ))}
        </div>

        <div className="space-y-2 text-sm text-gray-400">
          <div className="flex items-center justify-between">
            <span className="flex items-center">
              <Clock className="w-3 h-3 mr-1" />
              {item.size}
            </span>
            <span className="text-xs bg-white/10 px-2 py-1 rounded">{item.format}</span>
          </div>

          <div className="flex flex-wrap gap-1">
            {item.audio.slice(0, 3).map((a: string) => (
              <Badge key={a} variant="outline" className="text-xs bg-blue-500/20 text-blue-400 border-blue-500/30">
                {a}
              </Badge>
            ))}
          </div>
        </div>
      </CardContent>
    </Card>
  )
}
