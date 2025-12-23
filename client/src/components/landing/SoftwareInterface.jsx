import { motion } from "motion/react";
import {
  BarChart3,
  Globe,
  Smartphone,
  Code,
  Palette,
  Zap,
} from "lucide-react";

export default function SoftwareInterface() {
  const features = [
    { icon: Globe, label: "Web Development", color: "from-blue-500 to-blue-600" },
    { icon: Smartphone, label: "Mobile Apps", color: "from-green-500 to-green-600" },
    { icon: Code, label: "Custom Solutions", color: "from-purple-500 to-purple-600" },
    { icon: Palette, label: "UI/UX Design", color: "from-pink-500 to-pink-600" },
    { icon: BarChart3, label: "Analytics", color: "from-orange-500 to-orange-600" },
    { icon: Zap, label: "Performance", color: "from-yellow-500 to-yellow-600" },
  ];

  return (
    <div className="w-full h-full p-6 overflow-hidden">
      <motion.div
        className="mb-6"
        initial={{ opacity: 0, y: -20 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ delay: 0.5 }}
      >
        <div className="flex items-center justify-between mb-4">
          <div className="text-xl font-black bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            WEB&apos;S 360 Dashboard
          </div>
          <div className="flex gap-2">
            <div className="w-3 h-3 rounded-full bg-red-500" />
            <div className="w-3 h-3 rounded-full bg-yellow-500" />
            <div className="w-3 h-3 rounded-full bg-green-500" />
          </div>
        </div>
        <div className="text-xs text-gray-600">
          Complete Digital Solutions Platform
        </div>
      </motion.div>

      <div className="grid grid-cols-3 gap-3">
        {features.map((feature, index) => {
          const Icon = feature.icon;
          return (
            <motion.div
              key={feature.label}
              className="bg-white rounded-lg p-3 shadow-md hover:shadow-lg transition-shadow"
              initial={{ opacity: 0, scale: 0.8 }}
              animate={{ opacity: 1, scale: 1 }}
              transition={{ delay: 0.7 + index * 0.1 }}
            >
              <div
                className={`w-8 h-8 rounded-lg bg-gradient-to-br ${feature.color} flex items-center justify-center mb-2`}
              >
                <Icon className="w-4 h-4 text-white" />
              </div>
              <div className="text-xs">{feature.label}</div>
            </motion.div>
          );
        })}
      </div>

      <motion.div
        className="mt-6 grid grid-cols-3 gap-3"
        initial={{ opacity: 0, y: 20 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ delay: 1.5 }}
      >
        <div className="bg-white rounded-lg p-2 shadow-md">
          <div className="text-xs text-gray-600">Projects</div>
          <div className="text-lg font-black bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            500+
          </div>
        </div>

        <div className="bg-white rounded-lg p-2 shadow-md">
          <div className="text-xs text-gray-600">Clients</div>
          <div className="text-lg font-black bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
            200+
          </div>
        </div>

        <div className="bg-white rounded-lg p-2 shadow-md">
          <div className="text-xs text-gray-600">Success</div>
          <div className="text-lg font-black bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">
            99%
          </div>
        </div>
      </motion.div>
    </div>
  );
}
